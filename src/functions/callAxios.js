const axios = require('axios').default;

function Post() {
    axios.post('/server/crawler.php', {
        firstName: 'Fred',
        lastName: 'Flintstone'
      })
      .then(function (response) {
        return response;
      })
      .catch(function (error) {
        return error;
      });
}


export default Post;