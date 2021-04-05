import Post from './callAxios';

function createCanvas(img) {

  var canvas = document.createElement('canvas');
  
  var ctx = canvas.getContext('2d');

  canvas.width = 300;
  canvas.height = 300;

  ctx.drawImage(img, 0, 0, 300, 300);

  //var e = ctx.getImageData(0, 0, ctx.canvas.width, ctx.canvas.height);

  var response = Post();

  console.log(response);

}

function getImage(localImage) {

  var img = new Image(300, 300);

  img.src = localImage;

  img.onload = function() {  
    createCanvas(img);
  }

}

  export {getImage}
