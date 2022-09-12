// set the modal menu element

try{

    const targetEl = document.getElementById('modalEl');
    const btn = document.getElementsByClassName('t_btn');

console.log(btn);

// options with default values
const options = {
  placement: 'center',
  backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
  onHide: () => {
      console.log('modal is hidden');
  },
  onShow: () => {
      console.log('modal is shown');
  },
  onToggle: () => {
      console.log('modal has been toggled');
  }
};


/* 
* targetEl: required
* options: optional
*/
const modal = new Modal(targetEl, options);

for (let index = 0; index < btn.length; index++) {
    const element = btn[index];
    
    element.addEventListener('click',()=>{
        console.log('hello');
        modal.toggle();
    })
}
}catch(e){
    console.log(e); 
}