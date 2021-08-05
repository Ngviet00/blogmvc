var formatter = new Intl.NumberFormat('de-DE');

   var vn_total = document.getElementById('vn_total');
   var vn_dead = document.getElementById('vn_dead');
   var vn_active = document.getElementById('vn_active');
   var vn_recovered = document.getElementById('vn_recovered');

   var world_total = document.getElementById('world_total');
   var world_dead = document.getElementById('world_dead');
   var world_active = document.getElementById('world_active');
   var world_recovered = document.getElementById('world_recovered');

   fetch('https://corona.lmao.ninja/v2/countries/vn')
   .then(res => {
      return res.json();
   })
   .then(data =>{
      let v_total = formatter.format(data.cases) 
      let v_dead  = formatter.format(data.deaths)
      let v_active = formatter.format(data.active)
      let v_recovered = formatter.format(data.recovered)
      vn_total.innerHTML = v_total;
      vn_dead.innerHTML = v_dead;
      vn_active.innerHTML = v_active;
      vn_recovered.innerHTML = v_recovered;
   })
   .catch(err => {
      console.error(err);
   });   

   
   fetch('https://corona.lmao.ninja/v2/countries')
   .then(res => {
      return res.json();
   })
   .then(data =>{
      let w_total = data.reduce( ( sum, { cases } ) => sum + cases , 0);
      let w_deaths = data.reduce( ( sum, { deaths } ) => sum + deaths , 0);
      let w_active = data.reduce( ( sum, { active } ) => sum + active , 0);
      let w_recovered = data.reduce( ( sum, { recovered } ) => sum + recovered , 0);

      w_total = formatter.format(w_total);
      w_deaths = formatter.format(w_deaths)
      w_active = formatter.format(w_active)
      w_recovered = formatter.format(w_recovered)

      world_total.innerHTML = w_total;
      world_dead.innerHTML = w_deaths;
      world_active.innerHTML = w_active;
      world_recovered.innerHTML = w_recovered;
   })
   .catch(err => {
      console.error(err);
   });