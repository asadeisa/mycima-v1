var BuylistedMovies = [];
let IdentecalMove = [];
let finalRezalt = [];
// console.log(["gg", 'rr', 'tt'].includes('tt'));

for (let i = 0; i < userListedMovie.length; i++) {
  BuylistedMovies.push(userListedMovie[i].movie_name)
}
console.log(BuylistedMovies);
if (window.mochaPhantomJS) {
  mochaPhantomJS.run();
} else {
  var transactions = Allmovie;

  console.log(transactions);
  var apriori = new Apriori.Algorithm(.2, 0.4, true);
  var finalRuzalit = apriori.analyze(transactions);
  console.log(finalRuzalit);
  // document.write('<pre>' + JSON.stringify(finalRuzalit, null, '  ') + '</pre>');
  let associationRules = finalRuzalit.associationRules;
  for (let i = 0; i < associationRules.length; i++) {
    Object.entries(associationRules[i]).forEach(([key, value]) => {
      if (key == "lhs") {
        if (value.every(ele => BuylistedMovies.includes(ele)) == true) {
          // IdentecalMove.push(associationRules[i]);
          for(let k=0;k<associationRules[i].rhs.length;k++)
          {

            if(!BuylistedMovies.includes(associationRules[i].rhs[k]))
            {
              // console.log(BuylistedMovies.includes(associationRules[i].rhs[k]),BuylistedMovies,associationRules[i].rhs[k])
              // console.log(associationRules[i].rhs);
                 finalRezalt.push(associationRules[i].rhs);
  
            }
          }
        }
      }
    })
  }
  // console.log(IdentecalMove);
  console.log(finalRezalt);
  
    
    Livewire.emit('aprioriRezalut',[finalRezalt]);
  
}
