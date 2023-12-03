const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl:'server.php',
      todoList: [],
      newTask: "",
    };
  },
  methods: {
    readList(){
      axios
      .get(this.apiUrl).then((response)=>{
        this.todoList = response.data;       
      })
      .catch(function(error){
        // handle error
        console.log(error);
      })
      .finally(function(){
        //always executed
      });     
    },
    addTask(){
      //console.log(this.newTask);
      
      if(this.newTask == ""){
        return;
      }
      const data = new FormData();
      data.append("text", this.newTask);
      axios
        .post(this.apiUrl, data)
        .then((response)=>{
          console.log(response.data);
          this.todoList = response.data;  
        })
        .catch((error)=> {
          console.log(error);
        });
    },
  },

  mounted() {
    this.readList();
  },
}).mount("#app");