import $ from "jquery";

import '../../node_modules/flowbite/dist/flowbite';
// set the modal menu element
try{

    const targetEl = document.getElementById('modalEl');
    const btn = document.getElementById('btn');
    const close_client = document.getElementById('close_client');
    
// options with default values
const options = {
  placement: 'top',
  backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
  onHide: (e) => {
      console.log(e._targetEl);
    },
    onShow: (e) => {
        console.log(e._targetEl);
  },
  onToggle: () => {

      console.log('modal has been toggled');
  }
};

const modal = new Modal(targetEl, options);
// toggle the modal

btn.addEventListener('click',()=>{
    modal.toggle();

})
close_client.addEventListener('click',(e)=>{
    modal.toggle();
})
}catch(e){

}