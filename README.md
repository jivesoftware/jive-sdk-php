# jive-sdk-ruby-gem
![Alt](/dev_logo.png "Jive Developer Logo")

This is currently a placeholder for a series tools to assist Go developers to build Jive Add-Ons. Reach out in the [Jive Developer Community](community.jivesoftware.com/community/developer) if you are interested in contributing.

**This SDK is currently a work in progress.** :smile:

Please reference the [Jive-SDK-Your-Way: Get Paid to Contribute an SDK](https://community.jivesoftware.com/community/developer/blog/2015/11/09/jive-sdk-your-way-get-paid-to-contribute-an-sdk).

# To-do
- [ ] Validate headers -- register and unregister [Reference](https://community.jivesoftware.com/docs/DOC-99941#jive_content_id_Ensure_Register_Calls_are_Coming_from_a_Genuine_Jive_Instance)
- [ ] Validate signed fetch add-on requests [Reference](https://community.jivesoftware.com/docs/DOC-156557)
- [ ] Examples Framework [Reference](https://community.jivesoftware.com/docs/DOC-99941)
  - [ ] Tile (with **/jive/tile/register** and **/jive/tile/unregister** endpoints)
  - [ ] App (with static assets -- html, css, js)
  - [ ] Add-On (with configure screen and **/jive/addon/register** and **/jive/tile/unregister** endpoints)
- [ ] Documentation (include method defintions in README.md)

#Testing Validation
Test your encoded secret with a known output by CURLing the payload below to the registration endpoint.
  
  **Sample Payload:**
```
{  
  "clientId": "i5j15eikcd5u2xntgk5zu4lt93zkgx6z.i",
  "clientSecret": "7wmyigctxbopc22jo7u4xorxsn2m9r04.s",
  "code": "nki1dxrtl3r2q3kkgorwfkrmik234ppw.c",
  "scope": "uri:/api",
  "jiveUrl": "http://ws-z0-120493.jiveland.com:8080",
  "jiveSignature": "dtuW522kpoayRLFkPq6l3MOXxoKwfyNHsgGMlitr9PM=",
  "jiveSignatureURL": "https://market.apps.jivesoftware.com/appsmarket/services/rest/jive/instance/validation/29c38d1a-9c8a-4ec5-9b55-56fc44a5a402",
  "tenantId": "0ee9ae5c-4702-49eb-a716-3d46de4b10d3",
  "timestamp": "2013-07-12T15:28:46.493Z"  
}
```

**ClientSecret Hex Digest Output**:
`67988da9f1378acbff239942f39a4eecb8684e82a8a7c17abc7c333a5623580e`


# Begin Documentation
## function method(param1, param2)
This is an example documentation with information about the method. Describe what gets passed in, what it does, and what it returns (if anything).
For methods that include a HTTP request, include response codes for successes and failures as shown below.

### Response Codes
Success : `204`

Failure : `403`
