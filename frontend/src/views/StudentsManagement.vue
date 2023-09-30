
<template >
    <div >
        <div class="my-3 d-flex justify-content-between">
            <div class="search-container row col-6">
                <div class="col-8 mr-3">
                    <input class="form-control" type="text" v-model="searchQuery" @input="searchStudents" placeholder="search here ...">
                </div>
                <div class="col-4">
                    <select v-model="level_id" @change="getStudentsByLevel" id="" class="form-control" required>
                        <option value="1">level-1</option>
                        <option value="2">level-2</option>
                        <option value="3">level-3</option>
                        <option value="4">level-4</option>
                    </select>
                </div>
            </div>
            <div class="">
                <router-link to="/add_student" class="btn btn-outline-info text-dark p-2">Add Student</router-link>
            </div>

        </div>
        <div v-if="students">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Full Name </th>
                        <th scope="col">Code</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Level</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(student,index) in students" :key="index">
                        <td>{{student.full_name}}</td>
                        <td>{{student.code}}</td>
                        <td>{{student.email}}</td>
                        <td>{{student.date_of_birth}}</td>
                        <td>{{ student.level.name }}</td>
                        <td>
                            <div>
                                <button class="btn ml-3" @click="goToEdit(student.id)">
                                    <img src="../../public/assets/edit.png" alt="">
                                </button>
                                <button class="btn mx-2" @click="deleteStudent(student.id)">
                                    <img src="../../public/assets/x.png" alt="">
                                </button>
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div v-else> Loading</div>
    </div>
</template>

<script>
import axios from 'axios';
// import x from '../../public/assets/x.png';
export default {
    name:'students-app',
    data(){
        return {
            searchQuery:'',
            level_id:0,
            students:null,
        }
    },
    mounted(){
        axios.get('http://127.0.0.1:8000/api/students').then(res=>{
            console.log(res)
            this.students=res.data
        }) .catch(error => {
        console.error('Error fetching data:', error);
      });
    },
    methods:{
        deleteStudent(id){
            axios.delete(`http://127.0.0.1:8000/api/students/delete/${id}`).then(res=>{
                console.log(res.data);
                this.students = this.students.filter(student => student.id !== id);
            }).catch(error => {
              console.error(error); // Handle error
            });
        },

        goToEdit(id){
            this.$router.push(`students/${id}`)
        },

        searchStudents(){
            axios.get(`http://127.0.0.1:8000/api/student/search?query=${this.searchQuery}`)
         .then(res => {
            if (res.data.length > 0) {
             console.log(res.data);
             this.students=res.data
           } else {
             console.log("No matching students found.");
           }
        }) .catch(error => {
        console.error('Error fetching data:', error);
      });
        },

        getStudentsByLevel() {

            axios.get(`http://127.0.0.1:8000/api/students/level/${this.level_id}`)
                .then(res => {
                console.log(res.data);
                this.students=res.data
                })
                .catch(error => {
                console.error(error);
                });
  }





    }

}

</script>

<style>
img{
    height: 20px;
}
</style>
