class Jive {

  /**
  * Sign a string with a clientSecret using a specific algorithm
  *
  * @param string str String to sign
  * @param string secret The secret to use
  * @param string algorithm The hashing algorithm to use
  *
  * @result string The string signed with the secret
  */
  static public function Sign($str, $secret, $algorithm = 'sha256') {
	  $decodedClientSecret = base64_decode($secret);
	  $hash_hmac = hash_hmac($algorithm, $str, $decodedClientSecret, true);
	  return base64_encode($hash_hmac);
  }
 
 
  /**
  * Authenticate an authorizationheader
  *
  * @param string clientSecret Client secret from the Jive instance
  * e.g. 1xz2e8e1y6wmemu898079u03vooc7q6c.s
  * @param string authorizationHeader The Authorization header sent from Jive
  * e.g. Authorization:  algorithm=HmacSHA256&client_id=hy5ay42oakkvz9iz3ynfcopreq2jewtc.i&jive_url=https%3A%2F%2Fjive-butch.polldev.com%3A8443&tenant_id=76406c34-5df8-432f-a869-59192cacdafd-dev&timestamp=1429631304339&signature=pPta88C6K7gtXjs7SeAVwatjU58RGqk4GSG7EAkYFNU%3D
  *
  * @result boolean true/false - Whether we can trust the authorization header for this clientSecret
  */
  static public function Authenticate($clientSecret, $authorizationHeader) {
	  $parts = explode("JiveEXTN ", $authorizationHeader);
	  $authorization = isset($parts[1])? $parts[1] : "";
	  $paramMap = array();
	  if (strlen($authorization) > 0) {
	  parse_str($parts[1], $paramMap);
	  }
	  $paramStrWithoutSignature = substr($authorization, 0, strpos($authorization, "&signature="));
 
 
	  $signature = $paramMap["signature"];
	  $algorithm = $paramMap["algorithm"];
	  $clientId = $paramMap["client_id"];
	  $jiveUrl = $paramMap["jive_url"];
	  $tenantId = $paramMap["tenant_id"];
	  $timeStampStr = $paramMap["timestamp"];
 
 
	  $expectedSignature = Jive::Sign($paramStrWithoutSignature, $clientSecret);
 
 
	  return ($expectedSignature == $signature);
  }
}