const axios = require('axios').default;

function Post() {
    axios.post('/server/crawler.php', {
        text: 'Test text'
      })
      .then(function (response) {
        return response;
      })
      .catch(function (error) {
        return error;
      });
}


export default Post;