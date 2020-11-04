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

    // main message
    let message_main = new componentObject();
    message_main.create('div');
    message_main.attr('class', 'chitchat-main small-sidebar');
    message_main.attr('id', 'content');

    let chat_content = new componentObject();
    chat_content.create('div');
    chat_content.attr('class', 'chat-content tabto active');

    let message_custom = new componentObject();
    message_custom.create('div');
    message_custom.attr('class', 'messages custom-scroll active');
    message_custom.attr('id', 'chating');
    let contact_detail = new componentObject();
    contact_detail.create('div');
    contact_detail.attr('class', 'contact-details');

    // message row
    let message_row = new componentObject();
    message_row.create('div');
    message_row.attr('class', 'row');
    let search_form = new componentObject();
    search_form.create('form');
    search_form.attr('class', 'form-inline search-form');
    let chat_form_group = new componentObject();
    chat_form_group.create('div');
    chat_form_group.attr('class', 'form-group');
    let input_plaint_text = new componentObject();
    input_plaint_text.create('input');
    input_plaint_text.attr('class', 'form-control-plaintext');
    input_plaint_text.attr('type', 'search');
    input_plaint_text.attr('placeholder', 'Search..');
    let icon_close_search = new componentObject();
    icon_close_search.create('div');
    icon_close_search.attr('class', 'icon-close close-search');

    // col-7
    let col_7 = new componentObject();
    col_7.create('div');
    col_7.attr('class', 'col-7');

    let media_left = new componentObject();
    media_left.create('div');
    media_left.attr('class', 'media left');
    let sub_media_left = new componentObject();
    sub_media_left.create('div');
    sub_media_left.attr('class', 'media-left mr-3');
    let profile_online_trigger = new componentObject();
    profile_online_trigger.create('div');
    profile_online_trigger.attr('class', 'profile online menu-trigger');
    profile_online_trigger.cssObject({
        backgroundImage: 'url(./assets/images/contact/2.jpg)',
        backgroundSize: 'cover',
        backgroundPosition: 'center center',
        display: 'block'
    });

    let bg_img_message = new componentObject();
    bg_img_message.create('img');
    bg_img_message.attr('src', './assets/images/contact/2.jpg');
    bg_img_message.attr('alt', 'Avatar');

    let media_body = new componentObject();
    media_body.create('div');
    media_body.attr('class', 'media-body');

    let message_person_name = new componentObject();
    message_person_name.create('h5');
    message_person_name.content('Josephin water');
    let badge_status = new componentObject();
    badge_status.create('div');
    badge_status.attr('class', 'badge badge-success');
    badge_status.contentHTML('Active');
    // end message row

    // contact chat
    let contact_chat = new componentObject();
    contact_chat.create('div');
    contact_chat.attr('class', 'contact-chat');
    let ul_chat = new componentObject();
    ul_chat.create('ul');
    ul_chat.attr('class', 'chatappend');

    let li_replies = new componentObject();
    li_replies.create('li');
    li_replies.attr('class', 'replies');

    let chat_media = new componentObject();
    chat_media.create('div');
    chat_media.attr('class', 'media');

    let chat_profile = new componentObject();
    chat_profile.create('div');
    chat_profile.attr('class', 'profile mr-4');
    chat_profile.cssObject({
        backgroundImage: 'url(./assets/images/contact/2.jpg)',
        backgroundSize: 'cover',
        backgroundPosition: 'center center',
        display: 'block',
    });

    let chat_profile_img = new componentObject();
    chat_profile_img.create('img');
    chat_profile_img.attr('class', 'bg-img');
    chat_profile_img.attr('src', './assets/images/contact/2.jpg');
    chat_profile_img.css('display','none');

    let chat_media_body = new componentObject();
    chat_media_body.create('div');
    chat_media_body.attr('class', 'media-body');

    let chat_contact_name = new componentObject();
    chat_contact_name.create('div');
    chat_contact_name.attr('class', 'contact-name');

    let chat_name = new componentObject();
    chat_name.create('h5');
    chat_name.content('Alan josheph');

    let chat_time = new componentObject();
    chat_time.create('h6');
    chat_time.content('01:40 AM');

    let ul_message_box = new componentObject();
    ul_message_box.create('ul');
    ul_message_box.attr('class', 'msg-box');

    let li_msg_setting_main = new componentObject();
    li_msg_setting_main.create('li');
    li_msg_setting_main.attr('class', 'msg-setting-main');

    let msg_message = new componentObject();
    msg_message.create('h5');
    msg_message.content('Hi I am Alan,');

    let li_msg_setting_main_2 = new componentObject();
    li_msg_setting_main_2.create('li');
    li_msg_setting_main_2.attr('class', 'msg-setting-main');

    let msg_message_2 = new componentObject();
    msg_message_2.create('h5');
    msg_message_2.content('your personal assistant to help you');




    // build
    screen.childComponent(container_1.get());

    container_1.childComponent(nav.get());
    container_1.childComponent(leftSidebar.get());
    container_1.childComponent(message_main.get());

    message_main.childComponent(chat_content.get());
    chat_content.childComponent(message_custom.get());
    message_custom.childComponent(contact_detail.get());

    contact_detail.childComponent(message_row.get());
    message_row.childComponent(search_form.get());
    search_form.childComponent(chat_form_group.get());

    chat_form_group.childComponent(input_plaint_text.get());
    chat_form_group.childComponent(icon_close_search.get());

    message_row.childComponent(col_7.get());
    col_7.childComponent(media_left.get());
    media_left.childComponent(sub_media_left.get());
    sub_media_left.childComponent(profile_online_trigger.get());

    media_left.childComponent(chat_media_body.get());
    chat_media_body.childComponent(message_person_name.get());
    chat_media_body.childComponent(badge_status.get());

    // main message
    message_custom.childComponent(contact_chat.get());
    contact_chat.childComponent(ul_chat.get());
    ul_chat.childComponent(li_replies.get());
    li_replies.childComponent(chat_media.get());
    chat_media.childComponent(chat_profile.get());
    chat_profile.childComponent(chat_profile_img.get());

    chat_media.childComponent(media_body.get());

    media_body.childComponent(chat_contact_name.get());
    chat_contact_name.childComponent(chat_name.get());
    chat_contact_name.childComponent(chat_time.get());
    chat_contact_name.childComponent(ul_message_box.get());
    ul_message_box.childComponent(li_msg_setting_main.get());
    li_msg_setting_main.childComponent(msg_message.get());
    ul_message_box.childComponent(li_msg_setting_main_2.get());
    li_msg_setting_main_2.childComponent(msg_message_2.get());



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

    recent_slider.childComponent(second_item.get());
    second_item.childComponent(second_recent_box.get());
    second_recent_box.childComponent(second_dot_btn.get());
    second_recent_box.childComponent(second_recent_profile.get());
    second_recent_profile.childComponent(second_slide_img.get());
    second_recent_profile.childComponent(second_slide_name.get());



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