<div class="sidebar">
    <div class="item">
      <img class="icon" src="/icon1" alt="Icon 1" />
      <div class="text">App</div>
    </div>
    <hr/>
    <div class="item">
      <img class="icon" src="/icon2" alt="Icon 2" />
      <div class="text">Dashboard</div>
    </div>
    <div class="item">
      <img class="icon" src="/icon2" alt="Icon 2" />
      <div class="text">Search</div>
    </div>
  </div>
  
  <style>
    .sidebar {
      width: 60px;
      height: 100%;
      box-sizing: border-box;
      padding: 10px;
      background-color: #581616;
      transition: ease-in-out 0.3s;
      overflow: hidden;
    }
  
    .sidebar:hover {
      width: 200px;
    }
  
    .sidebar:hover > .item > .text {
      opacity: 1;
    }
  
    .hr {
      height: 1px;
      color: #161e76;
      margin: 15px 0;
    }
  
    .item {
      display: flex;
      align-items: center;
      margin: 20px 0;
    }
  
    .item .icon {
      width: 40px;
      height: 35px;
      flex-shrink: 0;
      fill: #c71919;
    }
  
    .item .text {
      opacity: 0;
      transition: ease-in-out 0.3s;
      transition-delay: 0.2s;
      margin-left: 15px;
      white-space: nowrap;
    }
  </style>