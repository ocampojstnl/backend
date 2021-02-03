<template>
    <div>
        <div class="form-group">
            <input type="text" id="customer-to" placeholder="To ." class="form-control" value="">
          </div>
          <div class="form-group">
            <input type="text" placeholder="To ." class="form-control">
          </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            // $(document).ready(function () {
            //     $('.btn').on('click', function () {
            //         alert();
            //     })
            // });
            
            axios.post('api/vue', {}).then(response => {
                     this.test = response.data;
                     // alert(test.name);
                 });
        },
        data : function () {
            return {
                test : null,
            }
        },
        props : [
            'text',
            'type' 
        ]
    }

</script>

<style>
    .my-button {
        background-color: red;
    }
</style>

