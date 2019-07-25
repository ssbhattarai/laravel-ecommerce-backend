<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Chats</div>
            <div class="card-body">
                Chats
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            axios.get('api/messages').then(()=>{
            console.log('MEssage is fetched from data base.');
            })
            .catch(()=>{
            console.log('Message created is failed');                
            })
        }
    }
</script>