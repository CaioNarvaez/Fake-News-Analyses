<template>
  <div class="columns is-mobile is-centered">
    <div class="box column is-half">
        <div class="file is-medium is-boxed has-name" id="file-js-example">
          <label class="file-label">
            <input class="file-input" type="file" name="resume" @change="handleFiles()" id="file-js">
            <span class="file-cta">
              <span class="file-icon">
                <i class="fas fa-upload"></i>
              </span>
              <span class="file-label" id="file-name">
                Escolha um arquivo..
              </span>
            </span>
          </label>
        </div>
      <div id="previewImage">
        <h2 class="is-size-4">Comparacao entre imagens</h2>
        <hr>
        <div v-if="url_image">
          <img :src="url_image" class="image-uploaded"/>       
          <img :src="url_image_data" />
        </div>
      </div>
    </div>    
  </div>
</template>

<script>
export default {
  name: 'Image',
  data: function() {
       return {
          url_image: null,
          url_image_data: 'https://i.pinimg.com/originals/dd/9a/98/dd9a98fd38f6f8c5d12da319f3dc3b52.jpg',
        }
  },
  methods: {
    handleFiles() {
          var fileDiv = document.getElementById("file-js-example");
          fileDiv.classList.add('is-success');
          

          var file = document.getElementById("file-js").files[0];
          var fileName = document.getElementById("file-name");

          fileName.textContent = file.name;

          this.url_image = URL.createObjectURL(file);
    }
  }
}
</script>


<style scoped>
.field {
  margin-top: 2%;
}

#file-js-example {
  width: 100%;
}

#file-js {
  width: 100%;
}

.file-label {
  width: 100%;
}

#previewImage {
  margin-top: 10%;
  margin-bottom: 10%;
  display: inline-block;
  justify-content: center;
  align-items: center;
}

#previewImage img {
  min-width: 30%;
  min-height: 350px;
  max-width: 45%;
  max-height: 350px;
}

.image-uploaded {
  border-right: 4px solid red;
}

h2 {
  margin-bottom: 5%;
}

</style>