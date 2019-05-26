import React, {Component} from 'react';
import Post from './Post';

export default class Posts extends Component {
   render() {
      return(
         <div className="left">
            <Post alt="Природа" src="https://img3.badfon.ru/original/1920x1080/e/78/priroda-derevya-les.jpg"/>
            <Post alt="Природа" src="https://avatars.mds.yandex.net/get-pdb/226447/f15b2366-d952-4f8a-9b94-de290a2140f0/s1200?webp=false"/>
         </div>
      )
   }
}
