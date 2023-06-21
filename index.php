<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=.7">
    <meta name="og:image" content="VCNU1.png">
		<link rel="shortcut icon" type="image/png" href="VCNU1.png"/>
    <title><?php echo $playlistName = ($a = explode('/',getcwd()))[sizeof($a)-1] . ' playlist';?></title>
		<meta name="description" content="<?php echo $playlistName;?>">
    <style>
      body, html{
        border: 0;
        background-color: #0000;
        background-image: url(https://jsbot.whitehot.ninja/uploads/hVMqI.jpg);
        background-repead: no-repeat;
        background-attachment: fixed;
        background-size: 100vw 100vh;
        height: 100vh;
        overflow: hidden;
        color:#cfd;
        font-size: .85em;
        font-family: courier;
        margin: 0;
      }
      .bg_overlay{
        position: fixed;
        width: 100vw;
        height: 100vh;
        z-index: 0;
        top: 0;
        left: 0;
        background: #0008;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100vw 100vh;
        background-position: center center;
      }
      .headerLogo{
        border-radius: 10px;
        border: 1px solid #4f82;
        position: fixed;
        cursor: pointer;
        left: 10px;
        background-size: 200px 50px;
        background-repeat: no-repeat;
        background-position: center center;
        background-color: #4f84;
        background-image: url(playlist_logo.png);
        top: 10px;
        z-index: 100;
        width: 200px;
        height: 50px;
      }
      .main{
        text-align: center;
        padding-bottom: 100px;
        z-index: 10;
        top: 0;
        left: 0;
        position: relative;
        min-height: 100vh;
        width: 100%;
      }
      .deleteButton{
        border: none;
        border-radius: 5px;
        outline: none;
        cursor: pointer;
        background-size: 35px 35px;
        background-position: center center;
        background-repeat: no-repeat;
        background-color: #0000;
        width: 35px;
        min-width: 25px;
        height: 35px;
        margin-left: 15px;
        margin-right: 15px;
        background-image: url(https://jsbot.whitehot.ninja/uploads/XeGsK.png);
      }
      .songButton{
        border-radius: 15px;
        display: inline-block;
        border: none;
        max-width: calc(75% - 0px);
        min-width: calc(75% - 0px);
        cursor: pointer;
        color: #afa;
        font-family: courier;
        font-size: 2em;
        padding: 10px;
        margin: 10px;
        whitespace: normal;
        text-align: left;
        text-shadow: 1px 1px 2px #000;
        padding-left: 60px;
        padding-right: 5px;
        background-image: url(2ftyk1.png);
        background-color: #044;
        background-repeat: no-repeat;
        background-position: 10px center;
        background-size: 45px 45px;
      }
      .playerFrame{
        left: 0;
        top:0;
        margin-top:0px;
        width:100%;
        min-width: 600px;
        max-width: 70%;
        height:290px;
        border:none;
        vertical-align:top;
        border-radius: 10px;
      }
      input[type=checkbox]{
        transform: scale(2.0);
      }
      label{
        font-size: 2em;
      }
      .jumpButton{
        position: fixed;
        left: 0;
        top: 0;
        margin: 20px;
        border-radius: 5px;
        font-size: 16px;
        background: #408;
        color: #fff;
        border: none;
        z-index: 20;
        font-weight: 900;
        font-family: courier;
        cursor: pointer;
      }
      .trackButtons{
        margin-top: 20px;
        width:100%;
        min-width: 600px;
        max-width: 75%;
        display: inline-block;
        max-height: calc(100vh - 390px);
        overflow-x: hidden;
        overflow-y: auto;
      }
      .modal{
        position: fixed;
        width: 100vw;
        height: calc(100vh - 100px);
        padding-top: 100px;
        text-align: center;
        background: #001414e8;
        display: none;
        overflow-y: auto;
      }
      #addTrackModal{
        z-index: 100;
      }
      .addTrackButton{
        font-size: 16px;
        margin: 10px;
        width: calc(100% - 100px);
      }
      .normalButtons{
        border: none;
        border-radius: 5px;
        outline: none;
        background: #2fc6;
        color: #8fc;
        text-shadow: 2px 2px 2px #000;
        font-size: 24px;
        cursor: pointer;
        min-width: 150px;
        font-family: courier;
      }
      .closeButton{
        background: #300;
        color: #fcc;
      }
      .searchButton{
        background: #032;
        color: #8fc;
      }
      input[type=text]{
        font-size: 24px;
        background: #000;
        border: none;
        outline: none;
        font-family: courier;
        min-width: 400px;
        border-bottom: 1px solid #084;
        color: #ffc;
        text-align: center;
      }
      .audiocloud{
        background: #206;
      }
      a{
        color: #ff0;
        text-decoration: none;
        background: #002;
        border-radius: 5px;
        padding: 5px;
      }
      #searchResults{
        width: 800px;
        padding: 20px;
        padding-bottom: 100px;
        font-size: 24px;
        display: inline-block;
      }
      #audiocloudDiv{
        backgroundL #f00;
      }
      #youtubeDiv{
        backgroundL #04f;
      }
      .youtubeLogo{
        color: #fff;
        background: #f00;
        font-weight: 900;
      }
      #bufferedTrack{
        top: 348px;
        left: 50%;
        line-height: 16px;
        transform: translate(-50%);
        font-size: 18px;
        background: linear-gradient(90deg, #000, #0000);
        position: absolute;
        text-align: left;
        padding: 5px;
        break-word: break-all;
        width: 65%;
        color: #bbba;
      }
      .bufferTrackTitle{
        font-size: 16px;
        font-style: oblique;
        color: #aaa;
      }
      .loaded{
        background: #4f8c;
        color: #000;
        position: absolute;
        margin-top: -1px;
        margin-left: 5px;
        font-size: 16px;
        line-height: 16px;
        font-weight: 900;
      }
    </style>
  </head>
  <body>
    <div class="headerLogo" onclick="window.location.href='/public_playlists'" title="go to homepage"></div>
    <div class="bg_overlay"></div>
    <div id="addTrackModal" class="modal">
      <input
        spellcheck="false"
        type="text"
        autofocus
        onkeypress="searchMaybe(event)"
        id="searchBar"
      ><br>
      <div style="width: 300px;text-align: left;margin-left:auto;margin-right: auto;margin-top: 20px;">
        <label for="exactCB">
          <input type="checkbox" id="exactCB" oninput="toggleExact(this)">
          exact match
        </label><br>
        <label for="allWordsCB">
          <input type="checkbox" checked id="allWordsCB" oninput="toggleAllWords(this)">
          include all words
        </label>
      </div>
      <br><br><br>
      <button onclick="search()" class="searchButton normalButtons">search</button><br><br>
      <button onclick="closeModal('#addTrackModal')" class="closeButton normalButtons">close</button><br><br>
      <div id="searchResults"></div>
    </div>
    <div class="main">
      <br>
      <label for="shuffle">
        <input type="checkbox" checked id="shuffle" oninput="toggleShuffle(this)">
        shuffle
      </label>
      <button onclick="showModal('#addTrackModal')" class="normalButtons">add track(s)</button>
      <br><br>
      <div id="iframeDiv">
        <iframe
          class="playerFrame"
          src=""
        ></iframe>
      </div>
      <br><br>
      <div class="trackButtons"></div>
      <div id="bufferedTrack"><span style="color: #fff;">next track:</span><br></div>
    <script>
      Rn=Math.random
      userInteracted = false
      let searchBar = document.querySelector('#searchBar')
      let searchResults = document.querySelector('#searchResults')
      let allWordsCB = document.querySelector('#allWordsCB')
      let exactCB = document.querySelector('#exactCB')
      let iframeDiv = document.querySelector('#iframeDiv')
      let buffer_el = ''
      let nextRnd
      let shuffle = true
      let exact = false
      let allWords = true      
      let bufferedTrack=document.querySelector('#bufferedTrack')

      window.onkeydown=e=>{
        if(e.keyCode==27) closeModal('#addTrackModal')
      }

      searchMaybe=e=>{
        let sparam = searchBar.value
        if(e.keyCode==13 && sparam !== ''){
          search()
        }
      }
      
      addTrack=(id, source)=>{
        sendData = { id, source }
        //searchResults.innerHTML = ''
        //searchBar.value = ''
        //closeModal('#addTrackModal')
        setTimeout(()=>{
          alert("\nthe track is being added.\n\nif successful, it will appear in your list shortly, as if by magic...")
        }, 0)
        fetch('addTrack.php',{
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(sendData),
        }).then(res=>res.json()).then(data=>{
          if(data[0]){
            tracks = ['tracks/' + data[1], ...tracks]
            renderTracks()
          } else {
            alert('there was a problem adding the track!')
          }
        })
      }
      
      search=()=>{
        let sparam = searchBar.value
        sparam = searchBar.value
        if(!sparam) return
        sendData = { sparam, allWords, exact }
        fetch('search.php',{
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(sendData),
        }).then(res=>res.json()).then(data=>{
          if(data[0]){
            res = JSON.parse(data[2])
            searchResults.innerHTML=`search results [<a href="https://audiocloud.dweet.net" target="_blank">audiocloud</a>]<br><div id="audiocloudDiv">`
            res[0].map(v=>{
              searchResults.innerHTML+=`<button class="normalButtons addTrackButton audiocloud"
                onclick="addTrack(`+v.id+`, 'audiocloud')"
                title="description: `+v.description+`">`+v.trackName+`</button>`
            })
            if(!res.length) searchResults.innerHTML+='no results'
            searchResults.innerHTML+='<br><br><br>search results ['
            let sp = document.createElement('span')
            sp.innerHTML='youtube'
            sp.className='youtubeLogo'
            searchResults.appendChild(sp)
            searchResults.innerHTML+=`]<br><br></div><div id="youtubeDiv">`
            searchResponse = data[1]
            searchResponse.map(v=>{
              searchResults.innerHTML+=`<button class="normalButtons addTrackButton"
                onclick="addTrack('`+v.id+`', 'youtube')"
                title="description: `+v.description+`">`+v.snippet.title+`</button>`
            })
            if(!searchResponse.length) searchResults.innerHTML+='no results'
            searchResults.innerHTML+='</div>'
          } else {
            alert('there was a problem searching... :(')
          }
        })
      }
      
      closeModal=modal=>{
        document.querySelector(modal).style.display='none'
      }
      
      showModal=modal=>{
        document.querySelector(modal).style.display='block'
        searchBar.focus()
      }
      
      scrollUp=()=>{
        window.scrollTo(0, 0)
      }
      
      deleteTrack=idx=>{
        let trackName=(l=decodeURI(tracks[idx]).split('/'))[l.length-1]
        if(confirm("\n\nAre you SURE you want to do this????\n\nthis action is irreversible!")){
          sendData = { trackName }
          fetch('deleteTrack.php',{
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(sendData),
          }).then(res=>res.json()).then(data=>{
            if(data[0]){
              tracks=tracks.filter((q,j)=>j!=idx)
              setTimeout(()=>renderTracks(), 0)
            }else{
              alert("d'oh.\n\nthere was an error or summat")
            }
          })
        }
      }
      
      next = ''
      
      preloadNext=()=>{
        setTimeout(()=>{
          nextRnd = shuffle? Rn()*tracks.length|0 : (curIDX + 1)%tracks.length
          let nextTrackName=decodeURI(tracks[nextRnd].replaceAll('tracks/',''))
          let t=0
          let loadingTimer = setInterval(()=>{
            bufferedTrack.innerHTML='<span style="color: #afc;font-weight: 900;">next track:</span>'+" <span style=\"color: #aaa;font-weight: 900;\">(buffering"+('.'.repeat(t%8))+('&nbsp;'.repeat(8-(t%8)))+")</span>"+'<br>'+('&nbsp;'.repeat(4))+'<span class="bufferTrackTitle">'+nextTrackName+'</span>'
            t+=1
          }, 50)
          preload = new Audio()
          preload.style.position='absolute'
          preload.style.visibility='hidden'
          document.body.appendChild(preload)
          setTimeout(()=>{
            clearInterval(loadingTimer)
          }, 30000)
          setTimeout(()=>{
            preload.crossorigin="anonymous"
            preload.src = window.location.href + tracks[nextRnd] + (userInteracted ? '?autoplay' : '')
            preload.onloadeddata=()=>{
              clearInterval(loadingTimer)
              bufferedTrack.innerHTML='<span style="color: #afc;font-weight: 900;">next track:</span>'+` <span class="loaded">(loaded!)</span>`+'<br>'+('&nbsp;').repeat(4)+'<span class="bufferTrackTitle">'+nextTrackName+'</span>'
            }
          }, 5000)
        }, 0)
      }
      
      playTrack=idx=>{
        let src = '/index.php/' + window.location.href + tracks[idx] + (userInteracted ? '?autoplay' : '')
        console.log(idx, userInteracted, src)
        let el
        (el = document.querySelectorAll('.playerFrame')[0])
        preloadNext()
        postMessage(JSON.stringify({'userInteracted': userInteracted}))
        el.src = '/index.php/' + window.location.href + tracks[idx] + (userInteracted ? '?autoplay' : '')
      }
      
      curIDX = 0

      renderTracks=()=>{
        let trackDiv = document.querySelectorAll('.trackButtons')[0]
        trackDiv.innerHTML = ''
        tracks.map((v, i)=>{
          let tb = document.createElement('button')
          tb.className = 'songButton'
          tb.onclick = () =>{
            playTrack(curIDX = i)
          }
          tb.innerHTML = decodeURI(v.replaceAll('tracks/', '')) + '<br>'
          trackDiv.appendChild(tb)
          let db = document.createElement('button')
          db.className = 'deleteButton'
          db.onclick = () =>{
            deleteTrack(curIDX = i)
          }
          trackDiv.appendChild(db)
        })
      }

      postMessage=msg=>{
        let el
        (el = document.querySelectorAll('.playerFrame')[0])
        if(el.src.indexOf('index.php') != -1){
          el.contentWindow.postMessage(msg, '*')
        }
      }
      window.addEventListener('message', e => {
        console.log(e)
        const key = e.message ? 'message' : 'data';
        const data = e[key];
        switch(data){
          case 'ended':
            playTrack(shuffle ? nextRnd : curIDX=(curIDX+1)%tracks.length)
          break
          case 'playing':
            userInteracted = true
          break
        }
      },false);

      toggleShuffle=e=>{
        shuffle = e.checked
        preloadNext()
      }

      toggleExact=e=>{
        exact = e.checked
      }

      toggleAllWords=e=>{
        allWords = e.checked
      }


tracks = ["4th_wave.mp3","desire paths.mp3","limbic.mp3","square inception.mp3","above ground.mp3","different days.mp3","living in the audiocloud.mp3","starship excelsior.mp3","acoustic.mp3","dinner and a movie Project.mp3","lobotomy.mp3","stephanie poetri - touch (unicorn mix).mp3","after dark.mp3","dragonfly.mp3","madonna - borderline (unicorn mix).mp3","stormy.mp3","aligning stars.mp3","dua lipa - break my heart (unicorn mix).mp3","madonna - lucky star (unicorn mix).mp3","streamers.mp3","Alstroemeria.mp3 duality.mp3 magnesium.mp3 streets.mp3","ambient loop 1.mp3","Elizabeth Cotten - In the Sweet By and By.mp3","magnets.mp3","string theory.mp3","angels.mp3 emerge.mp3","march of the cloud people.mp3","subspace ripples.mp3","anthropology 2.0.mp3","emotional pigsty.mp3","massive.mp3","suzanne vega - luka.mp3","anthropology 3.0.mp3","epiphany.mp3","mazzy star - fade into you (unicorn mix).mp3","swarm.mp3","anthropology.mp3","ethnicities.mp3","meteorology.mp3","sweet spot.mp3","antispace.mp3 eye.mp3","Miami Nights.mp3","symbols from beyond.mp3","argon.mp3 flint.mp3 microcosm.mp3 synthesis.mp3","ariana and nicki - side to side2.mp3","flux actual.mp3","nadir.mp3 tachyon.mp3","aurora - cure for me.mp3","flux fancy.mp3","natural fun.mp3","target practice.mp3","Aurora - Exist for Love.mp3","flux.mp3 nebula.mp3","taylor swift - delicate (unicorn mix).mp3","avril - skater boi.mp3","flying hex.mp3","next level.mp3","taylor swift - epiphany (unicorn mix).mp3","avril - what the hell.mp3","forks.mp3 nightshade.mp3","Taylor Swift - Lover (unicorn mix).mp3","awakening.mp3 fractreeglobe.mp3 noname.mp3","tessa - crush.mp3","axle grind.mp3","full orbit.mp3","ocean.mp3","tessa make me a robot.mp3","beat 1.mp3","funnel cake.mp3","october.mp3","tessa not over you.mp3","being driven (guitar mix).mp3","funnel pie.mp3","omega.mp3","tessa - tennessee.mp3","being driven.mp3","geoflux.mp3","ophelia (unicorn mix).mp3","text song.mp3","beneath the crust.mp3","giant oaks.mp3","orbital geometry.mp3","the barn that time forgot.mp3","Billie Eilish - Party Favor (unicorn mix).mp3","gogos vacation.mp3","perspective warper.mp3","the darkest green.mp3","billie eilish - rosella - everything i wanted.mp3","golden bird.mp3","phi.mp3","the deepest lake.mp3","bisection.mp3","golden spiral.mp3","plato.mp3","the dying swan.mp3","blair witch.mp3","grape skittles.mp3","pogues - love you till the end (performed by birds of a feather) (unicorn mix).mp3","the eye of the storm.mp3","bonnet.mp3","grateful dead - friend of the devil (unicorn mix).mp3","point jumper.mp3","the ghost.mp3","breaking formation.mp3","greece.mp3","Prince - Little Red Corvette (Official Music Video) [v0KpfrJE4zw].mp4","the inner light.mp3","breaking the ice.mp3","groove in F.mp3","princess chelsea - overseas.mp3","the kicks.mp3","butterflies fancier.mp3","halogen.mp3 pudding.mp3","the long path.mp3","cant hurry love.mp3","heavenly conduit.mp3","rds.mp3","the mission.mp3","cellular automata.mp3","heterochromia.mp3 rdsv.mp3","the physical world.mp3","cheeseflux.mp3 hexcubes.mp3","rebel red.mp3","the river nile.mp3","cherubim.mp3","hex zoom.mp3","reflecting pool.mp3","tove lo - habits.mp3","choral.mp3","hipbreaker 3000.mp3","responsive.mp3","tree of knowledge.mp3","chromatics - on fire.mp3","hip breaker.mp3","retro jam.mp3","triple torus knot.mp3","chvrches - good girls.mp3","icona pop - i dont care i love it (unicorn mix).mp3","rosemary.mp3","venus in furs.mp3","cloth actual.mp3","icosahedron.mp3 rufus.mp3 venus.mp3","cloud city.mp3","idea realm.mp3","sacred geometry.mp3","waterfall.mp3","club1.mp3 idylic.mp3 scanlines.mp3","wave function collapse.mp3","club2.mp3 immovable.mp3 schrodinger.mp3 wavey.mp3","colossus.mp3","intact heart.mp3","self care.mp3","wednesday.mp3","coras jam.mp3","interstellar.mp3 seraphim.mp3 wells.mp3","cylinders.mp3","i was happy until you promised me happiness.mp3","shifting sands.mp3","when the moon was made.mp3","cyndi lauper - time after time.mp3","jello world.mp3","sierpenski.mp3","wings actual.mp3","dark_waltz.mp3 jumper.mp3","skeletons on parade.mp3","wings.mp3","darkwave.mp3 labyrinth.mp3 smiley_face.mp3","winter days.mp3","daya hideaway.mp3","lakelife.mp3","sorting hat.mp3","dead sea.mp3","lattice.mp3 spaceflex.mp3","debbie gibson - only in my dreams.mp3","leaf devil.mp3","sprites extra fancy.mp3"]

      tracks = tracks.map(v=> 'tracks/'+encodeURIComponent(v))


      vid = document.createElement('video')
      vid.style.position = 'absolute'
      vid.style.opacity = '0'
      vid.style.top = '0'
      vid.style.zIndex=-1;
      vid.style.mouseEvents = 'none'
      vid.style.left = '0'
      document.body.appendChild(vid)
      vid.src='sleepBuster.mp4'
      vid.loop=true
      vid.muted=true
      vid.play()
      renderTracks()
      nextRnd = Rn()*tracks.length|0
      playTrack(shuffle ? nextRnd : curIDX=(curIDX)%tracks.length)
    </script>
    </div>
  </body>
</html>
