<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form ref="form" @submit.prevent='onSubmit' method="post" enctype="multipart/form-data">
                            Product name:
                            <br/>
                            <input type="text" name="name"/>
                            <br/><br/>
                            Product photos (can attach more than one):
                            <br/>
                            <input type="file" name="photos[]" multiple/>
                            <br/><br/>
                            <input type="submit" value="Upload"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods:{
            onSubmit(){
                var vm = this
                var formdata = new FormData(vm.$refs.form);
                axios.post('/api/upload', formdata).then(function(response){
                    console.log(response.data)
                })
            }
        }
    }
</script>
