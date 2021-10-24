<template>
  <div>
    <form @submit.prevent="submit_form">

    Thumbnail:
      <br>
    
      <input type="file" @change="select_file">
    
      <br><br>
    
      <input type="submit" class="btn btn-primary" :disabled="form_submitting"
      :value="form_submitting ? 'Saving comment...' : 'Save comment'">
    
    </form>
  </div>
</template>

<script>
export default{
  data() {
    return {
      fields: {
          thumbnail: null,
      },
      errors: {},
      form_submitting: false
    }
  },
  methods: {
    select_file(event){
      this.fields.thumbnail = event.target.files[0];
    },
    submit_form() {
      this.form_submitting = true;
      //pass thumbnail
      let fields = new FormData();
      for (let key in this.fields){
        fields.append(key, this.fields[key]);
      }
      // axios.post('/api/comments', this.fields)
      axios.post('/api/comments', fields)
        .then(response => {
          this.$swal('Comment saved!');
          this.$router.push('/');
          this.form_submitting = false;
        }).catch(error => {
          if(error.response.status === 422) {
            this.$swal({ icon: 'warning', title: 'Error happened'});
            this.errors = error.response.data.errors;
          }
          this.form_submitting = false;
        });
    }
  }
}
</script>