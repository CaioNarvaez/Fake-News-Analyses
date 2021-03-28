<template>
  <div> 
    <div class="columns is-mobile is-centered optionSection">
      <div class="column is-half">
        <div class="columns">
          <div class="column block" v-on:click="sendTest(1)">
            Texto
          </div>
          <div class="column block" v-on:click="sendTest(2)">
            Imagem
          </div>
        </div>
      </div>
    </div>


    <div class="components-demo" v-if="modelValue == 1">
      <Text />
    </div>
    <div class="components-demo" v-else-if="modelValue == 2">
      <Imagem />
    </div>

  </div>
</template>

<script>
import Imagem from './Imagem'
import Text from './Text'

export default {
  name: 'Body',
  data: function() {
       return {
          modelValue: null
        }
  },
  methods: {
    sendTest(value) {
      if(value == this.modelValue) {
        value = null
      }
      this.modelValue = value
    }
  },
  components: {
    Imagem,
    Text
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
.optionSection {
  margin-top: 5%;
}
.block {
  display: inline-block;
  height: 50px;
  margin: auto;
  background-color: #f1f1f1;
  border-radius: 6px;
  opacity: 0.5;
  margin-left: 1px;
  margin-right: 1px;
}
.block:hover {
  border: 2px solid #cecece;
  opacity: 1;
  cursor: pointer;
}
.block p {
  color: black;
  font-weight: 500;
  font-size: 12pt;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.components-demo {
  margin-top: 2%;
  padding: 10px;
}
</style>
