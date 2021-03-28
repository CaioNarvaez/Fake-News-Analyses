<template>
  <div class="columns is-mobile is-centered">
    <div class="box column is-half">
      <form>
        <div class="row">
          <div class="control">
            <textarea class="textarea has-fixed-size" placeholder="Insira o texto para a busca."></textarea>
          </div>
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link">Submit</button>
          </div>
          <div class="control">
            <button class="button is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>    
  </div>
</template>

<script>
export default {
  name: 'Text'
}
</script>


<style scoped>
.field {
  margin-top: 2%;
}
</style>