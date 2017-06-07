Load_Music:
    music.theme = LoadMusic("music.mp3")
    PlayMusic(music.theme, 1)
Return

Load_Sounds:
    sound.ball = LoadSound("gong.wav")
    sound.error = LoadSound("hit3.wav")
Return

Load_Images:
    bg_hovered.img = LoadImage ("bg-hovered.png")
    ballons.img = LoadImage ("ballons.png")
    background.img = LoadImage("bg.png")
    winbg.img = LoadImage("winbg.png")
    hs.img = LoadImage("hs.png")
    bg_settings.img = LoadImage("bg-settings.png")
    gameover_bg.img = LoadImage("gameover-bg.png")
    title.img = LoadImage("title.png")
    settings.img = LoadImage("settings.png")
    soundoff.img = LoadImage("soundoff.png")
    play.img = LoadImage("play.png")
    closebtn.img = LoadImage("closebtn.png")
    returne.img = LoadImage("return.png")
    returne2.img = LoadImage("return.png")
    quit.img = LoadImage("quit.png")
    quit2.img = LoadImage("quit.png")
    highs.img = LoadImage("highs.png")
    soundic.img  = LoadImage("sound.png")
    bonhomme.img = LoadImage("character.png")
    evil.img = LoadImage("evil.png")
    blank.img = LoadImage("blank.png")
    blankscore.img = LoadImage("blank.png")
    blanklives.img = LoadImage("blank.png")
    obstacle1.img = LoadImage("obs.png")
    obstacle2.img = LoadImage("obs.png")
    ball1.img = LoadImage("final.png")
    ball2.img = LoadImage("green.png")
    ball3.img = LoadImage("yellow.png")
    ball4.img = LoadImage("pink.png")

Return

Create_Sprites:

    background.spr = CreateSprite(background.img)
    bg_hovered.spr = CreateSprite(bg_hovered.img)
    bg_settings.spr = CreateSprite(bg_settings.img)
    hs.spr = CreateSprite(hs.img)
    gameover_bg.spr = CreateSprite(gameover_bg.img)
    soundic.spr = CreateSprite(soundic.img)
    returne.spr = CreateSprite(returne.img)
    returne2.spr = CreateSprite(returne2.img)
    winbg.spr = CreateSprite(winbg.img)
    quit.spr = CreateSprite(quit.img)
    quit2.spr = CreateSprite(quit2.img)
    soundoff.spr = CreateSprite(soundoff.img)
    SetSpriteVisible(bg_settings.spr, 0)
    SetSpriteVisible(gameover_bg.spr, 0)
    SetSpriteVisible(winbg.spr, 0)
    SetSpriteVisible(hs.spr, 0)
    SetSpriteVisible(soundic.spr, 0)
    SetSpriteVisible(returne.spr, 0)
    SetSpriteVisible(returne2.spr, 0)
    SetSpriteVisible(quit.spr, 0)
    SetSpriteVisible(soundoff.spr, 0)
    ballons.spr = CreateSprite(ballons.img)
    title.spr = CreateSprite(title.img)
    settings.spr = CreateSprite(settings.img)
    play.spr = CreateSprite(play.img)
    closebtn.spr = CreateSprite(closebtn.img)
    highs.spr = CreateSprite(highs.img)
    bonhomme.spr = CreateSprite(bonhomme.img)
    evil.spr = CreateSprite(evil.img)
    blank.spr = CreateSprite(blank.img)
    blankscore.spr = CreateSprite(blankscore.img)
    blanklives.spr = CreateSprite(blanklives.img)
    obstacle1.spr = CreateSprite(obstacle1.img)
    obstacle2.spr = CreateSprite(obstacle2.img)
    ball1.spr = CreateSprite(ball1.img)
    ball2.spr = CreateSprite(ball2.img)
    ball3.spr = CreateSprite(ball3.img)
    ball4.spr = CreateSprite(ball4.img)

Return


Set_Sprites_Properties:

    SetSpritePositionByOffSet(title.spr, width/2, height/2+35)
    SetSpritePositionByOffSet(play.spr, width/2 + 30, height/2+160)
    SetSpritePositionByOffSet(settings.spr, width/2 - 130, height/2+150)
    SetSpritePositionByOffSet(soundic.spr, width/2, height/2-40)
    SetSpritePositionByOffSet(soundoff.spr, width/2, height/2-40)
    SetSpritePositionByOffSet(returne.spr, width/2, height/2+50)
    SetSpritePositionByOffSet(returne2.spr, width/2, height/2+200)
    SetSpritePositionByOffSet(quit.spr, width/2, height/2+90)
    SetSpritePositionByOffSet(quit2.spr, width/2, height/2+270)
    SetSpritePositionByOffSet(highs.spr, width/2 + 170, height/2 + 120)
    SetSpritePositionByOffSet(bonhomme.spr, width/2, height/2)
    SetSpritePositionByOffSet(closebtn.spr, 30, height-20)
    SetSpritePositionByOffSet(evil.spr, width/2+200, height/2)
    SetSpritePositionByOffSet(ball1.spr, random (0, width), random (0, height))
    SetSpritePositionByOffSet(ball2.spr, random (0, width), random (0, height))
    SetSpritePositionByOffSet(ball3.spr, random (0, width), random (0, height))
    SetSpritePositionByOffSet(ball4.spr, random (0, width), random (0, height))
    SetSpritePositionByOffSet(obstacle1.spr, random (70, width/2), random (65, height/2))
    SetSpritePositionByOffSet(obstacle2.spr, random (width/2, width - width/5), random (height/2, height - height/8))
    SetSpritePositionByOffSet(blank.spr, width/2, 50)
    SetSpritePositionByOffSet(blanklives.spr, width - 155, 17)

    SetSpriteVisible(bonhomme.spr, 0)
    SetSpriteVisible(evil.spr, 0)
    SetSpriteVisible(ball1.spr, 0)
    SetSpriteVisible(ball2.spr, 0)
    SetSpriteVisible(ball3.spr, 0)
    SetSpriteVisible(ball4.spr, 0)
    SetSpriteVisible(blank.spr, 0)
    SetSpriteVisible(closebtn.spr, 0)
    SetSpriteVisible(obstacle1.spr, 0)
    SetSpriteVisible(obstacle2.spr, 0)
    SetSpriteVisible(blankscore.spr, 0)
    SetSpriteVisible(blanklives.spr, 0)



Return

Setup_Text:
    scortext = CreateText("Score : 0")
    SetTextSize( scortext, 20)
    SetTextAlignment(scortext, 1)
    SetTextColor( scortext, 0, 0, 0, 225 )
    SetTextPosition(scortext,width/8, 5 )
    livestext = CreateText("")
    setTextString(livestext,"Lives : 3")
    SetTextSize( livestext, 20)
    SetTextAlignment(livestext, 1)
    SetTextColor( livestext, 0, 0, 0, 225 )
    SetTextPosition(livestext,(width/4)*3+80, 5 )

    SetTextVisible(scortext, 0)
    SetTextVisible(livestext, 0)
Return


Setup_questions:

    losttext = CreateText("query : " + questions[i].query$)
    SetTextSize( losttext, 20)
    SetTextColor( losttext, 0, 225, 0, 225 )
    SetTextAlignment(losttext, 1)

    ans = CreateText(questions[i].answer$)
    SetTextSize( ans, 30)
    SetTextColor( ans, 0, 0, 0, 225 )

    prob1 = CreateText(questions[i].prop1$)
    SetTextSize( prob1, 30)
    SetTextColor( prob1, 0, 0, 0, 225 )

    prob2 = CreateText(questions[i].prop2$)
    SetTextSize( prob2, 30)
    SetTextColor( prob2, 0, 0, 0, 225 )

    prob3 = CreateText(questions[i].prop3$)
    SetTextSize( prob3, 30)
    SetTextColor( prob3, 0, 0, 0, 225 )

    level  = CreateText("level  1" )
    SetTextSize( level, 20)
    SetTextColor( level, 0, 225, 225, 225 )
    SetTextAlignment(level, 1)

    finalscore  = CreateText("Your final score is : 0" )
    SetTextSize( finalscore, 30)
    SetTextColor( finalscore, 0, 0, 0, 225 )
    SetTextAlignment(finalscore, 1)
    SetTextPosition(finalscore,width/2, 130 )
    SetTextVisible(finalscore, 0)

    highscore  = CreateText("hello first" )
    SetTextSize( highscore, 50)
    SetTextColor( highscore, 0, 0, 225, 225 )
    SetTextAlignment(highscore, 1)
    SetTextPosition(highscore,width/2, height/2 -110 )
    SetTextVisible(highscore, 0)


    SetTextPosition(losttext,width/2, 40 )
    SetTextPosition(ans,0 ,0)
    SetTextPosition(prob1,0 ,0)
    SetTextPosition(prob2,0 ,0)
    SetTextPosition(prob3,0 ,0)
    SetTextPosition(level,width/2 ,0)


    SetTextVisible(ans, 0)
    SetTextVisible(level, 0)
    SetTextVisible(losttext, 0)
    SetTextVisible(prob1, 0)
    SetTextVisible(prob2, 0)
    SetTextVisible(prob3, 0)

Return
