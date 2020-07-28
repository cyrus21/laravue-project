<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1>LINE Message Templates ({{templates.length}})</h1>
                    </div>
                    <div>
                        <button v-on:click="addNewTemplate()" class="btn btn-primary mx-sm-1 mx-xl-0">Create Template</button>
                    </div>
                </div>
                <hr class="mt-4">
                <table class="table table-hover">
                    <thead class="thead-light text-uppercase">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col" class="w-25">title</th>
                            <th scope="col">last updated</th>
                            <th scope="col">created</th>
                            <th scope="col" class="w-25 text-center">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(template) in templates" v-bind:key="template.id" v-bind:title="template.title">
                            <th scope="row">{{template.id}}</th>
                            <td>{{template.title}}</td>
                            <td>{{template.updated_at}}</td>
                            <td>{{template.created_at}}</td>
                            <td class="d-sm-flex d-xl-block">   
                                <a :href="'/template/'+template.id+'/edit'" class="btn btn-primary mx-sm-1 mx-xl-0">Edit</a>
                                <button v-on:click="copyTemplate(template.id)" class="btn btn-primary mx-sm-1 mx-xl-0">Duplicate</button>
                                <button v-on:click="deleteTemplate(template.id)" class="btn btn-primary mx-sm-1 mx-xl-0">Remove</button>
                            </td>
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
    data () {
        return {
          templates: [],
          id: ''
        }
    },
    mounted () {
      this.getTemplates()
    },
    methods: {
      getTemplates () {
        axios({ method: 'GET', url: '/api/template' }).then(
          result => {
            console.log(result.data);
            this.templates = result.data
          },
          error => {
            console.error(error)
          }
        )
      },
      addNewTemplate () {
        axios.post('/api/template',
          { title: 'Untitled' }
        ).then((res) => {
          this.getTemplates()
          location.href = '/template/'+res.data.id+'/edit';
          console.log(res)
        }).catch((err) => {
          console.log(err)
        })
      },

      copyTemplate (id) {
        axios.post(`/api/template/${id}`
        ).then((res) => {
          this.getTemplates()
          console.log(res)
        }).catch((err) => {
          console.log(err)
        })
      },
      
      deleteTemplate (id) {
        axios.delete(`/api/template/${id}`
        ).then((res) => {
          this.getTemplates()
          console.log(res)
        }).catch((err) => {
          console.log(err)
        })
      }
    }
  }
</script>