<head>
    <link rel="stylesheet" type="text/css" href="/css/mainJumbo_m.css">
    <link rel="stylesheet" type="text/css" href="/css/mainJumbo.css">
</head>
<?php 
if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in'] == TRUE){
    
    // echo '<p>login 정보</p>'.
    //     '<p>'.$this->session->userdata['nickname'].'</p>'.
    //     '<p>'.$this->session->userdata['email'].'</p>';
}
if(isset($this->session->userdata)){
    print_r($this->session);
}
?>
<div id="main_jb">
    <div id="main_jb_img_wrapper">
        <div id="main_jb_img">
            <img src="/image/back_2560.png">
        </div>
    </div>
    <div id="main_jb_wrapper">
        <div id="main_jb_text">
            <a href="/" id="title">강릉<br>관광<br>요람</a>
        </div>
        <div>
            <ul id="main_jb_ul">
                <li class="main_jb_ul_li"><a href="">About</a></li>
                <li>|</li>
                <li class="main_jb_ul_li"><a href="/index/categorize_page">Spotlist</a></li>
                <li>|</li>
                <li class="main_jb_ul_li"><a href="/index/map_page">map</a></li>
                <li>|</li>
                <li class="main_jb_ul_li"><a href="/index/board_page">board</a></li>
                <li>|</li>
                <li class="main_jb_ul_li"><a href="/index/signup">signup</a></li>
                <li>|</li>
                <li class="main_jb_ul_li"><a href="/index/signin">signin</a></li>
                <li>|</li>
                <li class="main_jb_ul_li"><a href="/index/signout">signout</a></li>
            </ul>
        </div>
    </div>
</div>
