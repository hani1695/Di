<style scoped>

  .rela-block {
    display: block;
    position: relative;
    margin: auto;
    
  }
  
  .floated {
    display: inline-block;
    position: relative;
    margin: false;
    
    float: left;
  }

  .containers {
    z-index: 1;
    width: 92%;
    max-width: 1126px;
    background-color: #f4f4f4;
    margin: 10px auto;
    padding: 70px 70px 10px 70px;
  }
  .profile-card {
    width: calc(100% - 40px);
    padding-top: 100px;
    margin: 70px auto 30px;
    background-color: #fff;
    /* box-shadow: 0 2px 6px -2px rgba(0,0,0,0.26); */
  }
  .profile-pic {
    display: false;
    position: absolute;
    margin: false;
    top: -90px;
    left: 50%;
    right: false;
    bottom: false;
    -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
    height: 180px;
    width: 180px;
    border: 10px solid #fff;
    border-radius: 100%;
    /* background: url("https://pbs.twimg.com/media/CdbiubzVIAANj8J.jpg") center no-repeat; */
    background-size: cover;
  }
  .profile-name-containers {
    margin: 0 auto 10px;
    padding: 10px;
    text-align: center;
  }
  .user-name {
    /* font-family: "Montserrat"; */
    font-size: 24px;
    letter-spacing: 3px;
    font-weight: 400;
    line-height: 30px;
    margin-bottom: 12px;
  }
  .user-desc {
    letter-spacing: 1px;
    color: #999;
  }
  .profile-card-stats {
    height: 75px;
    padding: 10px 0px;
    text-align: center;
    overflow: hidden;
  }
  .profile-stat {
    height: 100%;
    width: 33.3333%;
  }
  .profile-stat:after {
    color: #999;
  }
  .works::after {
    content: "works";
  }
  .followers::after {
    content: "followers";
  }
  .following::after {
    content: "following";
  }
  
  
  
 
  .footer {
   
    border-top: 1px solid #d6d6d6;
    background-color: #fff;
    padding: 30px 40px;
    text-align: center;
    overflow: hidden;
  }
  
 
  
 
  

</style>