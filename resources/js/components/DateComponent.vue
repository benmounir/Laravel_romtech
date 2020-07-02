<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Date</div>

                    <div class="card-body">
                       {{time}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                time : 'Visited page on : ' + new Date().toLocaleString(    )
            }
        }
    }
</script>
<style  scoped>
    .container{
        margin-top: 30px;
    }
</style>
