<template>
  <div>
      <div class="hello">
      <h1>
        Descubra se o que voce recebeu no ZipZop e Fake News <br>
      </h1>
      <p>ou nao</p>
    </div>

    <div>
      <div class="block">
        <p>Texto</p>
      </div>
      <div class="block">
        <p>Imagem</p>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: 'Body'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.block {
  display: inline-block;
  width: 30%;
  height: 150px;
  margin: auto;
  background-color: #f1f1f1;
  border: 1px solid white;
  border-radius: 6px;
}
.block:hover {
  -webkit-transform: scale(1.05);
  border: 2px solid #cecece;
}
.block p {
  color: #444;
  font-weight: 100;
  font-size: 18pt;
}
</style>
