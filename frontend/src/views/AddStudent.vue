
<template>
    <div class="container my-5 d-flex justify-content-center">
        <form @submit.prevent="submitForm" class="col-7">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" v-model="form_data.full_name" class="form-control" required >
            </div>
            <div class="mb-3">
                <label class="form-label">Code</label>
                <input type="text" v-model="form_data.code" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" v-model="form_data.email" class="form-control" required >
            </div>
            <div class="mb-3">
                <label class="form-label">Date Of Birth</label>
                <input type="date" v-model="form_data.date_of_birth" class="form-control" required>
            </div>
            <div class="mb-5">
                <label class="form-label">Level</label>
                <select v-model="form_data.level_id" id="" class="form-control" required>
                    <option value=""></option>
                    <option value="1">level-1</option>
                    <option value="2">level-2</option>
                    <option value="3">level-3</option>
                    <option value="4">level-4</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
    export default{
        data(){
            return{
                
                form_data:{
                    full_name:'',
                    code:'',
                    email:'',
                    date_of_birth:'',
                    level_id:''
                }
            }
        },
        methods:{
            submitForm(){
                axios.post('http://127.0.0.1:8000/api/students/add',{data:this.form_data}).then(res=>{
            console.log(res)
            this.$router.push('/students')

        }) .catch(error => {
        console.error('Error fetching data:', error);
      });
            }
        }
    }
</script>
