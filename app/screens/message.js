import componentObject from "vn-native-js/componentObject";
import header from "../components/header";
import running from "../components/running";
import VnNativeJs from "vn-native-js";
let lang = require('../languages/en.json');

let messageScreen = new Object;
messageScreen.render = function () {
    let screen = new componentObject();
    screen.create();

    let container_1 = new componentObject();
    container_1.create('div');
    container_1.attr('class', 'chitchat-container sidebar-toggle');

    // col-1
    let nav = new componentObject();
    nav.create('nav');
    nav.attr('class', 'main-nav on custom-scroll');

    let logo = new componentObject();
    logo.create('div');
    logo.attr('class', 'logo-warpper');

    let logoLink = new componentObject();
    logoLink.create('a');
    logoLink.attr('href', '#');

    let logoImg = new componentObject('img');
    logoImg.create('img');
    logoImg.attr('src', './assets/images/logo/logo.png');
    logoImg.attr('alt', 'logo');

    let sidebarMain = new componentObject();
    sidebarMain.create('div');
    sidebarMain.attr('class', 'sidebar-main');

    let sidebarTop = new componentObject();
    sidebarTop.create('ul');
    sidebarTop.attr('class', 'sidebar-top');

    let li_1 = new componentObject();
    li_1.create('li');

    let a_status = new componentObject();
    a_status.create('a');
    a_status.attr('class', 'button_effect');
    a_status.attr('data-tippy-content', 'status');
    a_status.attr('href', 'status');
    a_status.attr('data-info', 'Check Status here');

    let div_user_status = new componentObject();
    div_user_status.create('div');
    div_user_status.attr('class', 'user-popup status one');

    let sub_div_user_status = new componentObject();
    sub_div_user_status.create('div');
    sub_div_user_status.attr('class', 'bg-size');
    sub_div_user_status.cssObject({
        backgroundImage: 'url(./assets/images/avtar/2.jpg)',
        backgroundSize: 'cover',
        backgroundPposition: 'center center',
        display: 'block',
    });

    let sub_img_user_status_avatar = new componentObject();
    sub_img_user_status_avatar.create('img');
    sub_img_user_status_avatar.attr('class', 'bg-img');
    sub_img_user_status_avatar.attr('src', './assets/images/avtar/2.jpg');
    sub_img_user_status_avatar.attr('alt', 'Avatar');
    sub_img_user_status_avatar.cssObject({
        display:'none',
    })

    // col-2
    let leftSidebar = new componentObject();
    leftSidebar.create('aside');
    leftSidebar.attr('class', 'chitchat-left-sidebar left-disp');

    let recentActive = new componentObject();
    recentActive.create('div');
    recentActive.attr('class', 'recent-default dynemic-sidebar active');

    let div_recent = new componentObject();
    div_recent.create('div');
    div_recent.attr('class', 'recent');

    let recent_title = new componentObject();
    recent_title.create('div');
    recent_title.attr('class', 'theme-title');

    let media_title = new componentObject();
    media_title.create('div');
    media_title.attr('class', 'media');

    let sub_div_title = new componentObject();
    sub_div_title.create('div');

    let title_left_sidebar_content = new componentObject();
    title_left_sidebar_content.create('h2');
    title_left_sidebar_content.content('Recent');

    let chat_friend = new componentObject();
    chat_friend.create('h4');
    chat_friend.content('Chat from your friends');

    let recent_slider = new componentObject();
    recent_slider.create('div');
    recent_slider.attr('class', 'recent-slider recent-chat owl-carousel owl-theme');

    // first slide
    let first_item = new componentObject();
    first_item.create('div');
    first_item.attr('class', 'item');

    let first_recent_box = new componentObject();
    first_recent_box.create('div');
    first_recent_box.attr('class', 'recent-box');

    let first_dot_btn = new componentObject();
    first_dot_btn.create('div');
    first_dot_btn.attr('class', 'dot-btn dot-danger grow');

    let first_recent_profile = new componentObject();
    first_recent_profile.create('div');
    first_recent_profile.attr('class', 'recent-profile');

    let first_slide_img = new componentObject();
    first_slide_img.create('img');
    first_slide_img.attr('class', 'bg-img');
    first_slide_img.attr('src', './assets/images/avtar/1.jpg');
    first_slide_img.attr('alt', 'Avatar');

    let first_slide_name = new componentObject();
    first_slide_name.create('h6');
    first_slide_name.content('John deo');

    // second slide
    let second_item = new componentObject();
    second_item.create('div');
    second_item.attr('class', 'item');

    let second_recent_box = new componentObject();
    second_recent_box.create('div');
    second_recent_box.attr('class', 'recent-box');

    let second_dot_btn = new componentObject();
    second_dot_btn.create('div');
    second_dot_btn.attr('class', 'dot-btn dot-success grow');

    let second_recent_profile = new componentObject();
    second_recent_profile.create('div');
    second_recent_profile.attr('class', 'recent-profile online');

    let second_slide_img = new componentObject();
    second_slide_img.create('img');
    second_slide_img.attr('class', 'bg-img');
    second_slide_img.attr('src', './assets/images/avtar/big/audiocall.jpg');
    second_slide_img.attr('alt', 'Avatar');

    let second_slide_name = new componentObject();
    second_slide_name.create('h6');
    second_slide_name.content('John');


    // build
    screen.childComponent(container_1.get());

    container_1.childComponent(nav.get());
    container_1.childComponent(leftSidebar.get());

    leftSidebar.childComponent(recentActive.get());
    recentActive.childComponent(div_recent.get());
    div_recent.childComponent(recent_title.get());
    recent_title.childComponent(media_title.get());
    media_title.childComponent(sub_div_title.get());
    sub_div_title.childComponent(title_left_sidebar_content.get());
    sub_div_title.childComponent(chat_friend.get());

    div_recent.childComponent(recent_slider.get());
    recent_slider.childComponent(first_item.get());
    first_item.childComponent(first_recent_box.get());
    first_recent_box.childComponent(first_dot_btn.get());
    first_recent_box.childComponent(first_recent_profile.get());
    first_recent_profile.childComponent(first_slide_img.get());
    first_recent_profile.childComponent(first_slide_name.get());



    nav.childComponent(logo.get());
    nav.childComponent(sidebarMain.get());

    sidebarMain.childComponent(sidebarTop.get());
    sidebarTop.childComponent(li_1.get());
    li_1.childComponent(a_status.get());
    a_status.childComponent(div_user_status.get());
    div_user_status.childComponent(sub_div_user_status.get());
    sub_div_user_status.childComponent(sub_img_user_status_avatar.get());



    logo.childComponent(logoLink.get());
    logoLink.childComponent(logoImg.get());



    return screen.get();
}
export default messageScreen;