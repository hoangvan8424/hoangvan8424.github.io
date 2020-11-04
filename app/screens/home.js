import componentObject from 'vn-native-js/componentObject';
import header from '../components/header.js';
import running from '../components/running.js';
import VnNativeJs from 'vn-native-js';
let lang = require('../languages/en.json');
/**   
 * Layout  
 */
let homeScreen = new Object;
homeScreen.render = function(){
        let screen = new componentObject();
        screen.create();
        /**
         * Some information
         */ 
        let content = new componentObject();
        content.create('section');
        content.attr('class','container');
        content.cssObject({
                padding:50
        });
        let homeContent =  lang.homeIntro;
        homeContent = homeContent + lang.layout_used;
        content.content(homeContent);

        // about home link 
        let aboutLink = new componentObject();
        aboutLink.create('button');
        let vnnati = new VnNativeJs();
        aboutLink.attr('href','about.html');
        aboutLink.attr('class','btn btn-danger');
        aboutLink.setEvent('click',() => {
                vnnati.activeRoute({url:'about.html'});
        });
        aboutLink.content('Go to about');
        aboutLink.cssObject({
                marginLeft:50
        });

        let messageLink = new componentObject();
        messageLink.create('button');
        messageLink.attr('href', 'message.html');
        messageLink.attr('class', 'btn btn-primary');
        messageLink.setEvent('click', function () {
                vnnati.activeRoute({
                        url: 'message.html'
                });
        })
        messageLink.content("Messenger");
        messageLink.cssObject({
                marginLeft:50
        })

        // build 
        screen.childComponent(header());
        screen.childComponent(content.get());
        screen.childComponent(aboutLink.get());
        screen.childComponent(running());

        screen.childComponent(messageLink.get());

        return screen.get();
}
export default homeScreen;