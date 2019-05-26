import React, {Component} from 'react';
import User from './User';

export default function Users() {
   return (
      <div className="right">
         <User 
               src="https://w-dog.info/wallpapers/0/15/380763978615567.jpg"
               alt="Красотка"
               name="Красотуля"/>
         <div className="users__block">
         <User 
               src="https://w-dog.info/wallpapers/0/15/380763978615567.jpg"
               alt="Красотка"
               name="Красотуля"
               min/>
         <User 
               src="https://w-dog.info/wallpapers/0/15/380763978615567.jpg"
               alt="Красотка"
               name="Красотуля"
               min/>
         <User 
               src="https://w-dog.info/wallpapers/0/15/380763978615567.jpg"
               alt="Красотка"
               name="Красотуля"
               min/>
         <User 
               src="https://w-dog.info/wallpapers/0/15/380763978615567.jpg"
               alt="Красотка"
               name="Красотуля"
               min/>
         </div>
      </div>
   )
}