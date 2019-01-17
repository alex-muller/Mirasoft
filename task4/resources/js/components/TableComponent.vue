<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 offset-md-2">
                <h1>Lessons</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Lesson Name</th>
                        <th scope="col">Rate Type</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="lesson in lessons">
                        <td>{{ lesson.name }}</td>
                        <td>{{ lesson.rateType }}</td>
                        <td>{{ lesson.duration }}</td>
                        <td>{{ lesson.price }} ₴</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="3">Total:</th>
                        <th>{{ total }} ₴</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
          return {
              lessons: [],
              total: 0
          }
        },
        created() {
            this.getLessons()
        },
        methods: {
            getLessons() {
                axios.get('/api')
                  .then(res => {
                      this.lessons = res.data.data
                      this.total = res.data.total
                  })
            }
        }
    }
</script>
