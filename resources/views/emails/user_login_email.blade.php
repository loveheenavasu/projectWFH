<style>

.uk-sectiona {
  border: solid;
  border-color: #d2d4dc;
  border-radius: 2px 2px 2px 2px;
  padding-left: 30px;
  padding-right: 30px;
}
.pad {
  padding: 0px 20px;
}

.pb {
  padding-bottom: 20px;
}
.uk-section-muted {
  background-color: #f1f3f4;
}
.uk-button {
  border-radius: 200px;
  width: 200px;
}

.uk-text-left {
  padding-left: 20px;
}

.circle {
  color: #f9c528;
  font-size: 25px;
}
.pd {
margin: 5px;
}
</style>


<br>
<div class="pad">
<div class="uk-section uk-sectiona">
  <div class="uk-container pb" uk-grid>
      <div class="uk-width-1-2">
        <img src="https://zestgeek.com/ZestGeek%20final%20file1.svg" alt="" width="160px">
      </div>
      <div class="uk-width-1-2">
        <img src="https://zestgeek.com/ZestGeek%20final%20file1.svg" class="uk-align-right" alt="" width="3000px">
      </div>  
</div>
  <hr class="uk-divider-icon">
  <div class="uk-section uk-section-muted">
  <div class="uk-container">
        <h2 class="uk-text-center">Congratulation!</h2>
            <div>
                <p class="uk-text-center">You have successfully been registered to Zestgeek Solution Pvt Ltd as a Developer
            </div>
            <div>
              <p class="uk-text-left"><i class="circle"></i>  Your login credentials are provided below:</p>

              <span style="font-weight:bold;">Email: &nbsp;</span><span style="font-weight:lighter;" class="circle">{{$email}}</span> 
             <br>
              <span style="font-weight:bold;">Password: &nbsp;</span><span style="font-weight:lighter;" class="circle">{{$password}}</span>
            </div>
    <div><br>
      <h5 class="uk-text-small pd ">Regards,</h5>
      <h5 class="uk-text-bold uk-text-medium pd ">Zestgeek Solution Team</h5>
      <div>
          <hr class="uk-divider-icon">
      </div>
      <p></p>
      <div>
          <hr class="uk-divider-icon">
      </div>
      <p class="uk-text-center" class="circle"><strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Zestgeek</a>.</strong>
    All rights reserved.</p>
        
      </div>
        </div>

    </div>
  </div>
</div>
<br>