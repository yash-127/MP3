<style>
    
.skeleton-wrapper2 {
    margin-top:-34px;
 
}
.skeleton-header3 {
  margin-left: 40px;
  height: 40px;
  width: 500px;
  border-radius: 4px;
  background: #e0e0e0;
  background: linear-gradient(
    100deg,
    #e0e0e0 30%,
    #f5f5f5 50%,
    #e0e0e0 70%
  );
  background-size: 800px 100%; /* broader gradient for smooth travel */
  animation: shineHeader3 1.6s infinite ease-in-out;
}

@keyframes shineHeader3 {
  0% {
    background-position: -500px 0;
  }
  100% {
    background-position: 500px 0;
  }
}



.skeleton-card4 {
  width: 280px;
  height: 280px;
  border-radius: 8px;
  background: #e0e0e0;
  background: linear-gradient(
    100deg,
    #e0e0e0 30%,
    #f5f5f5 50%,
    #e0e0e0 70%
  );
  background-size: 800px 100%; /* larger for smooth travel */
  animation: shineCard2 1.6s infinite ease-in-out;
}

@keyframes shineCard2 {
  0% {
    background-position: -500px 0;
  }
  100% {
    background-position: 500px 0;
  }
}



.skeleton-card3 {
  margin-left: 12px;
  width: 1025px;
  height: 400px;
  border-radius: 8px;
  background: linear-gradient(90deg, #e0e0e0 25%, #f5f5f5 50%, #e0e0e0 75%);
  background-size: 1500px 100%; /* wider for big div */
  animation: shineWide 2s infinite linear;
}
@keyframes shineWide {
  0% {
    background-position: -500px 0;
  }
  100% {
    background-position: 1500px 0;
  }
}

.skeleton-grid2 {
    margin-left:;
  display: grid;
  grid-template-columns: repeat(4, 250px); 
  gap: 20px; 
 
  padding: 30px;
  box-sizing: border-box;
}
.skeleton-header,
.skeleton-header3,
.skeleton-header2,
.skeleton-card,
.skeleton-card2 {
  background: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
  background-size: 400% 100%;
}

</style>

<div class="skeleton-wrapper2">

      <div class="skeleton-grid2 ">
          <div class="skeleton-card4"></div>
          <div class="skeleton-header3"></div>
       
      </div>
      
          <div class="skeleton-card3"></div>
</div>