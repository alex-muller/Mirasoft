<template>
  <div class="container">
    <div v-if="isError" class="error">
      <h1>Ooops! Something wrong!</h1>
    </div>
    <div v-else>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <h1>The answer is: <strong>{{ answer }}</strong></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3 image" :style="{'background-image': 'url('+image+')'}"></div>
      </div>
      <div class="row mt-5">
        <div class="col-md-4 offset-md-4 align-content-center">
          <button @click="getAnswer" class="btn btn-primary btn-lg btn-block">Try Again</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  export default {
    data() {
      return {
        answer: "",
        image : "",
        isError: false
      }
    },
    created() {
      this.getAnswer()
    },
    methods: {
      getAnswer() {
        axios.get('/api')
          .then(res => {
            this.isError = false
            this.answer = res.data.answer.toUpperCase()
            this.image = res.data.image
          })
          .catch(err => {
            console.log(err)
            this.isError = true
          })
      }
    }
  }
</script>
<style>
  .image {
    height: 400px;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
  }
</style>