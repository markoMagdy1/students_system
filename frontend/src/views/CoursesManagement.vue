
<template >
    <div>
        <div class="my-3 d-flex justify-content-between">
            <div class="search-container row col-6">
                <div class="col-8 mr-3">
                    <input class="form-control" type="text" v-model="searchQuery" @input="searchCourses" placeholder="search here ...">
                </div>

            </div>


        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Name </th>
                    <th scope="col">Description</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="(course,index) in courses" :key="index">
                    <td>{{course.code}}</td>
                    <router-link class="table-link" :to="'/courses/'+ course.id">
                        <td>{{course.name}}</td>
                    </router-link>
                        <td>{{course.description}}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name:'courses-app',
    data(){
        return {
            searchQuery:'',
            courses:[{}]
        }
    },
    mounted(){
        axios.get('http://127.0.0.1:8000/api/courses').then(res=>{
            this.courses=res.data;
        }).catch(error=>{
            console.log(error)
        })
    },
    methods:{
        searchCourses(){
            axios.get(`http://127.0.0.1:8000/api/course/search?query=${this.searchQuery}`)
                .then(res => {
                    if (res.data.length > 0) {
                    console.log(res.data);
                    this.courses=res.data
                } else {
                    console.log("No matching courses found.");
                }
                }) .catch(error => {
                console.error('Error fetching data:', error);
                });
        },

    }
}
</script>

<style scoped>
.table-link {
    display: block; /* Make the router-link a block element */
    text-decoration: none; /* Remove the default underline style */
    color: #007bff; /* Set the link color */
    /* Optionally add other styles like font-weight, hover effects, etc. */
}
     a{
        padding: 0px;
        margin: 0px;
        text-decoration: none;
        font-weight: 600;
        height: 0px;

        /* z-index: -1; */
    }

</style>
