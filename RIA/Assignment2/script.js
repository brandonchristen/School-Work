  var ADAL = new AuthenticationContext({
      instance: 'https://login.microsoftonline.com/',
      tenant: 'common', //COMMON OR YOUR TENANT ID

      clientId: 'cee3db37-9d5d-4685-95e1-1a12303cb945', //This is your client ID
      redirectUri: 'http://localhost/', //This is your redirect URI

      callback: userSignedIn,
      popUp: true,
      //scope: office.onenote_update
  });

  function signIn() {
      ADAL.login();
  }

  function userSignedIn(err, token) {
      console.log('userSignedIn called');
      if (!err) {
          console.log("token: " + token);
          showWelcomeMessage();
      }
      else {
          console.error("error: " + err);
      }
  }

  var url = 'https://login.live.com/oauth20_authorize.srf+?response_type=code&client_id={client-id}&redirect_uri={redirect-uri}&scope={scope}';

  function showWelcomeMessage() {
      var Notes = document.getElementById('Notes');
      var user = ADAL.getCachedUser();
      var divWelcome = document.getElementById('WelcomeMessage');
      divWelcome.innerHTML = "Welcome " + user.profile.name;
      var Nav = document.getElementById("NavTools")
      Nav.innerHTML = "<li><button onclick='AddNote()'>Add</button></li>" +
                  "<li><button onclick='SaveNote()'>Save</button></li>" +
                  "<li><button onclick='EditNote()'>Edit</button></li>" +
                  "<li><button onclick='DeleteNote()'>Delete</button></li>" 
  }

