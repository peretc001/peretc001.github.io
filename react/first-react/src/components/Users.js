import React, {Component} from 'react';
import User from './User';
import InstaService from '../services/instaservices';
import ErrorMessage from '../components/ErrorMessage';

export default class Users extends Component {
   InstaService = new InstaService();
    
   state = {
      posts: [],
      error: false
   }

   componentDidMount() {
      this.updatePosts();
   }

   updatePosts() {
      this.InstaService.getAllPosts()
      .then(this.onPostsLoaded)
      .catch(this.onError);
   }

   onPostsLoaded = (posts) => {
      this.setState({
         posts,
         error: false
      })
   }

   onError = (err) => {
      this.setState({
         error: true
      })
   }

   renderItems(arr) {
      return arr.map((item) => {
         const {name, altname, photo, id} = item;
         return (
            <div key={id}>
               <User 
                  src={photo}
                  alt={altname}
                  name={name}
                  min/>
            </div>
         )
      })
   }


   render() {
      const {error, posts} = this.state;
      if(error) {
         return <ErrorMessage/>
      }

      const items = this.renderItems(posts);

      return(
         <div className="right">
               <User 
                  src="https://w-dog.info/wallpapers/0/15/380763978615567.jpg"
                  alt="Красотка"
                  name="Красотка"/>
               <div className="users__block">
                  {items}
            </div>
         </div>
      )
   }
}
