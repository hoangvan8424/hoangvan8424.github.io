import homeComponent from '../screens/home.js';
import aboutComponent from '../screens/about.js';
import messageComponent from '../screens/message';
let MainRouterConfig = {
    layout : "index.html",
    routers :[
        {
            url:'',
            component : homeComponent
        },
        {
            url:'index.html',
            component : homeComponent
        },
        {
            url:'about.html',
            component : aboutComponent
        },
        {
            url:'message.html',
            component: messageComponent
        }
    ]
}
export default MainRouterConfig;