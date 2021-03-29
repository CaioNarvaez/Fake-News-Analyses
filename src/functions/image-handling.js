function getBase64Image(img) {
    // Create an empty canvas element
    var canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;

    // Copy the image contents to the canvas
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);

    var dataURL = canvas.toDataURL("image/png");

    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}

function compareImages(image_uploaded, image_source) {
    var a = new Image(),
        b = new Image();
    
    a.src = image_uploaded;
    b.src = image_source;

    var a_base64 = getBase64Image(a),
        b_base64 = getBase64Image(b);
    
    if (a_base64 === b_base64)
    {
      console.log("ARE EQUAL");
    }
    else {
      console.log("ARE DIFFERENT");
    }
  }

  export {compareImages}
