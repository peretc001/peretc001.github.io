import React, {Component} from 'react';
import User from './User';

export default class Post extends Component {
   render() {
      return(
         <div className="post">
            <User 
               src="https://w-dog.info/wallpapers/0/15/380763978615567.jpg"
               alt="Красотка"
               name="Красотуля"/>
            <img src={this.props.src} alt={this.props.alt}></img>
            <div className="post__name">
               some acount
            </div>
            <div className="post__descr">
               Lorem ndslfnsn nlnl тдтыва в as dsdvsg afsdsad
            </div>
         </div>
      )
   }
}