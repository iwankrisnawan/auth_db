<!DOCTYPE html>
<head>
<title>Google Drive API Javascript tutorial</title>
</head>
<body>
  <div class="" id="data">
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://apis.google.com/js/api.js"></script>
  <script>
    /**
     * Sample JavaScript code for drive.files.list
     * See instructions for running APIs Explorer code samples locally:
     * https://developers.google.com/explorer-help/guides/code_samples#javascript
     */

    function authenticate() {
      return gapi.auth2.getAuthInstance()
          .signIn({scope: "https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/drive.appdata https://www.googleapis.com/auth/drive.file https://www.googleapis.com/auth/drive.metadata https://www.googleapis.com/auth/drive.metadata.readonly https://www.googleapis.com/auth/drive.photos.readonly https://www.googleapis.com/auth/drive.readonly"})
          .then(function(data) { console.log("Sign-in successful"); },
                function(err) { console.error("Error signing in", err); });
    }
    function loadClient() {
      gapi.client.setApiKey("AIzaSyATvzV9dVFZKMr_hIjYldipdaW18qGgOGc");
      return gapi.client.load("https://content.googleapis.com/discovery/v1/apis/drive/v3/rest")
          .then(function() { console.log("GAPI client loaded for API"); },
                function(err) { console.error("Error loading GAPI client for API", err); });
    }
    // Make sure the client is loaded and sign-in is complete before calling this method.
    function execute() {
      return gapi.client.drive.files.list({})
          .then(function(response) {
                  // Handle the results here (response.result has the parsed body).
                  console.log("Response", response);
                  // console.log(response.body);
                  console.log(response.result.files);
                  console.log(response.result.files[0]);
                  console.log(response.result.files[1]);
                },
                function(err) { console.error("Execute error", err); });
    }
    gapi.load("client:auth2", function() {
      gapi.auth2.init({client_id: "23266959492-5thlmi3gg9hpm62mjl9dcimfusgroh8t.apps.googleusercontent.com"});
    });

  </script>
  <button onclick="authenticate().then(loadClient)">authorize and load</button>
  <button onclick="execute()">execute</button>

</body>
</html>
