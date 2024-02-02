if("serviceWorker" in navigator){
    navigator.serviceWorker.register("service_worker.js").then(registration=>{
      console.log("Registered!");
    }).catch(error=>{
      console.log("Registration Failed");
    });
}else{
  console.log("Not supported");
}