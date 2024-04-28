<form action="/posts" method="POST">
    @csrf
  
      <div class="md:px-20 pt-6 mb-5">
        <div class="px-6 py-10 max-w-2xl mx-auto"> 
          <h1 class="text-2xl font-bold text-gray-200 mb-2">Post, bitch!</h1>   
          
          <textarea name="title" rows="1" placeholder="Title" class="w-full p-4 text-gray-600 bg-slate-100 rounded-md focus:ring-orange-300"></textarea>
             
          <textarea name="text" rows="3" placeholder="Your fakin post..." class="w-full p-4 text-gray-600 bg-slate-100 rounded-md focus:ring-orange-300"></textarea>
                    
          <x-form-validation-errors/>
          
          <button class="bg-orange-300 p-3 mt-3 border border-slate-500 rounded-md font-bold hover:brightness-110">Add post</button>                    
          
        </div>
      </div>
  </form>