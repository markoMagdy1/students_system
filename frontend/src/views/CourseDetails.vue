
<template >
    <div >
        <div class="my-3 d-flex justify-content-end">
            <div class="">
                <router-link to="/add_student" class="btn btn-outline-info text-dark p-2">Add Student</router-link>
            </div>

        </div>
        <div v-if="students">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Students Full Name </th>
                        <th scope="col">Student Code</th>
                        <th scope="col">practical exam
                            <div class="text-center">
                                (Max: 50)
                            </div>
                        </th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Level</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(student,index) in students" :key="index">
                        <td>{{student.full_name}}</td>
                        <td>{{student.code}}</td>
                        <!-- <td>{{student.email}}</td>
                        <td>{{student.date_of_birth}}</td>
                        <td>{{ student.level.name }}</td> -->
                        <td>
                            <div>
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
        axios.get(`http://127.0.0.1:8000/api/course/students/${this.$route.params.id}`).then(res=>{
            this.students=res.data
        }) .catch(error => {
        console.error('Error fetching data:', error);
      });
    },
//     methods:{


//   }




}

</script>

<style scoped>
img{
    height: 20px;
}
tr{
    /* display: flex; */
    /* align-items: center; */
    /* justify-content: start; */
    text-align: center;
}
</style>
