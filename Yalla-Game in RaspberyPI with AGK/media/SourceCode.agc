                       
                           
                    
                   
                        

Type _obj
    img
    spr
    x#
    y#
    sx#
    sy#
    w
    h
    xflag
    yflag
    point
EndType

Type _question
    query$
    answer$
    prop1$
    prop2$
    prop3$
EndType

Type _media
    theme
    ball
    error
EndType


`def des objet et media
bg_hovered as _obj
gameover_bg as _obj
winbg as _obj
title as _obj
hs as _obj
background as _obj
bg_settings as _obj
ballons as _obj
play as _obj
closebtn as _obj
returne as _obj
returne2 as _obj
quit as _obj
quit2 as _obj
soundic as _obj
soundoff as _obj
settings as _obj
highs as _obj
blank as _obj
blankscore as _obj
blanklives as _obj
ball1 as _obj
ball2 as _obj
ball3 as _obj
ball4 as _obj
bonhomme as _obj
evil as  _obj
obstacle1 as  _obj
obstacle2 as  _obj
rightanswer as  _obj
null as  _obj
music as _media
sound as _media


Dim questions[50] as _question
Gosub tabrempl
Gosub Game_Settings
Gosub Environment_Setup
Gosub Load_Music
Gosub Load_Sounds
Gosub Load_Images
Gosub Create_Sprites
Gosub Set_Sprites_Properties
Gosub Setup_Text
Gosub Setup_questions
Gosub Readscore
Gosub MenuGame
Gosub Randomize_BH
Gosub Randomize_evil
Gosub Randomize_Ball1
Gosub Randomize_Ball2
Gosub Randomize_Ball3
Gosub Randomize_Ball4


DO
Gosub Update_BH
Gosub Wall_Detection1
Gosub Wall_Detection2
Gosub Wall_Detection3
Gosub Wall_Detection4
Gosub Update_ball1
Gosub Update_ball2
Gosub Update_ball3
Gosub Update_ball4
Gosub update_propositon
Gosub Right_Detect_Collision
Gosub BH_Wall_Detection
Gosub enemychaser
Gosub closegame
Gosub death
Gosub win
Gosub Lives_Check
Sync()

Loop            
BH_Wall_Detection:

    If ((GetSpriteCollision(obstacle1.spr,bonhomme.spr)) = 1 || (GetSpriteCollision(obstacle2.spr,bonhomme.spr) = 1))


bonhomme.x# = GetSpriteX(bonhomme.spr)
bonhomme.y# = GetSpriteY(bonhomme.spr)

SetSpritePositionByOffset(bonhomme.spr,bonhomme.x#,bonhomme.y#)

    EndIf
return
Wall_Detection1:

    If ball1.x# > width
        ball1.xflag = 0
    EndIf
    If ball1.y# > height
        ball1.yflag = 0
    EndIf
    If ball1.x# < 50
        ball1.xflag = 1
    EndIf
    If ball1.y# < 0
        ball1.yflag = 1
    EndIf

Return

Wall_Detection2:
    If ball2.x# > width
        ball2.xflag = 0
    EndIf

    If ball2.y# > height
        ball2.yflag = 0
    EndIf

    If ball2.x# < 50
        ball2.xflag = 1
    EndIf

    If ball2.y# < 0
        ball2.yflag = 1
    EndIf

Return
Wall_Detection3:

    If ball3.x# > width
        ball3.xflag = 0
    EndIf

    If ball3.y# > height
        ball3.yflag = 0
    EndIf

    If ball3.x# < 0
        ball3.xflag = 1
    EndIf

    If ball3.y# < 0
        ball3.yflag = 1
    EndIf

Return

Wall_Detection4:

    If ball4.x# > width
        ball4.xflag = 0
    EndIf

    If ball4.y# > height
        ball4.yflag = 0
    EndIf

    If ball4.x# < 0
        ball4.xflag = 1
    EndIf

    If ball4.y# < 0
        ball4.yflag = 1
    EndIf
Return

Update_ball1:
    if ball1.xflag = 0
        ball1.x# = ball1.x# - ball1.sx#
    else
        ball1.x# = ball1.x# + ball1.sx#
    endif
    if ball1.yflag = 0
        ball1.y# = ball1.y# - ball1.sy#
    else
        ball1.y# = ball1.y# + ball1.sy#
    endif

    SetSpritePositionByOffset(ball1.spr,ball1.x#,ball1.y#)


Return

Update_ball2:


    if ball2.xflag = 0
        ball2.x# = ball2.x# - ball2.sx#
    else
        ball2.x# = ball2.x# + ball2.sx#
    endif

    if ball2.yflag = 0
        ball2.y# = ball2.y# - ball2.sy#
    else
        ball2.y# = ball2.y# + ball2.sy#
    endif

    SetSpritePositionByOffset(ball2.spr,ball2.x#,ball2.y#)


Return


Update_ball3:
    if ball3.xflag = 0
        ball3.x# = ball3.x# - ball3.sx#
    else
        ball3.x# = ball3.x# + ball3.sx#
    endif
        if ball3.yflag = 0
        ball3.y# = ball3.y# - ball3.sy#
    else
        ball3.y# = ball3.y# + ball3.sy#
    endif

    SetSpritePositionByOffset(ball3.spr,ball3.x#,ball3.y#)


Return


Update_ball4:
    if ball4.xflag = 0
        ball4.x# = ball4.x# - ball4.sx#
    else
        ball4.x# = ball4.x# + ball4.sx#
    endif
        if ball4.yflag = 0
        ball4.y# = ball4.y# - ball4.sy#
    else
        ball4.y# = ball4.y# + ball4.sy#
    endif

    SetSpritePositionByOffset(ball4.spr,ball4.x#,ball4.y#)


Return

Right_Detect_Collision:
if GetSpriteCollision(rightanswer.spr,bonhomme.spr) = 1

        i = i+1
        gosub update_questions
    if (i<11)
        score = score + (1/timer())*100
    else
        score = score + (1/timer())*200

     Endif
      if (i=10)
    setTextString(level,"Level : 2")
    Endif
     setTextString(scortext,"Score : "+str(score))

    Endif
Return


Update_BH:

lastxpos  = bonhomme.x#
lastypos  = bonhomme.y#


x# = GetJoystickX ( )
y# = GetJoystickY ( )


 // add input to sprites position
SetSpritePosition ( bonhomme.spr, GetSpriteX(bonhomme.spr) + 7*x#, GetSpriteY(bonhomme.spr)+ 7*y# )

bonhomme.x# = GetSpriteX(bonhomme.spr) + 7*x#
bonhomme.y# = GetSpriteY(bonhomme.spr)+ 7*y#


if (GetSpriteY(bonhomme.spr) <60)
	SetSpriteY(bonhomme.spr,60)
endif

if  (GetSpriteY(bonhomme.spr) >height - height/4 + 60 )
	SetSpriteY(bonhomme.spr,60)
endif

if  (GetSpriteX(bonhomme.spr) <0)
	SetSpriteX(bonhomme.spr,0)
endif

if  (GetSpriteX(bonhomme.spr) >width - width/5 + 120)
	SetSpriteX(bonhomme.spr,width - width/5 + 120)
endif




Return

Lives_Check:
    if Lives =< 0
                Restart =0
                SetSpriteVisible(gameover_bg.spr, 1)
                SetSpriteVisible(bg_hovered.spr, 0)
                SetSpriteVisible(ballons.spr, 0)
                SetSpriteVisible(title.spr, 0)
                SetSpriteVisible(play.spr, 0)
                SetSpriteVisible(highs.spr, 0)
                SetSpriteVisible(settings.spr, 0)
                SetSpriteVisible(bonhomme.spr, 0)
                SetSpriteVisible(evil.spr, 0)
                SetSpriteVisible(ball1.spr, 0)
                SetSpriteVisible(ball2.spr, 0)
                SetSpriteVisible(ball3.spr, 0)
                SetSpriteVisible(ball4.spr, 0)
                SetSpriteVisible(blank.spr, 0)
                SetSpriteVisible(obstacle1.spr, 0)
                SetSpriteVisible(obstacle2.spr, 0)
                SetTextVisible(losttext, 0)
                SetSpriteVisible(blankscore.spr,0)
                SetSpriteVisible(blanklives.spr, 0)
                SetTextVisible(ans, 0)
                SetTextVisible(prob1, 0)
                SetTextVisible(prob2, 0)
                SetTextVisible(prob3, 0)
                SetTextVisible(scortext, 0)
                SetTextVisible(livestext, 0)
                SetTextVisible(level, 0)
        repeat
            if GetPointerPressed() =1 then  Restart =1

            Sync()
         Until Restart = 1

    width = 1024
    height = 600

    ball1.sx# = 3
    ball1.sy# = 3

    ball2.sx# = 3
    ball2.sy# = 3

    ball3.sx# = 3
    ball3.sy# = 3

    ball4.sx# = 3
    ball4.sy# = 3

    ball1.xflag = 0
    ball2.xflag = 0
    ball3.xflag = 1
    ball4.xflag = 1

    ball1.yflag = 0
    ball2.yflag = 1
    ball3.yflag = 0
    ball4.yflag = 1
    score = 0
    lives = 3
    i as integer = 0
    ball1.x# = random (50, width/2 -50)
    ball1.y# = random (50, height -50)
    ball2.x# = random (0, width/2 )
    ball2.y# = random (0, height/2)
    ball3.x# = random (50, width/2 -50)
    ball3.y# = random (50, height -50)
    ball4.x# = random (50, width/2 -50)
    ball4.y# = random (50, height -50)
    bonhomme.x# = random (0, width)
    bonhomme.y# = random (0, height)

    setTextString(scortext,"Score : "+str(score))
    setTextString(livestext,"Lives : "+str(lives))
    setTextString(level,"level  1")
    gosub   update_questions
    SetSpriteVisible(gameover_bg.spr, 0)
    SetSpriteVisible(bonhomme.spr, 1)
    SetSpriteVisible(evil.spr, 1)
    SetSpriteVisible(ball1.spr, 1)
    SetSpriteVisible(ball2.spr, 1)
    SetSpriteVisible(ball3.spr, 1)
    SetSpriteVisible(ball4.spr, 1)
    SetSpriteVisible(blank.spr, 1)
    SetSpriteVisible(closebtn.spr, 1)
    SetSpriteVisible(obstacle1.spr, 1)
    SetSpriteVisible(obstacle2.spr, 1)
    SetTextVisible(losttext, 1)
    SetSpriteVisible(blankscore.spr,1)
    SetSpriteVisible(blanklives.spr, 1)
    SetTextVisible(ans, 1)
    SetTextVisible(prob1, 1)
    SetTextVisible(prob2, 1)
    SetTextVisible(prob3, 1)
    SetTextVisible(scortext, 1)
    SetTextVisible(livestext, 1)
    SetTextVisible(level, 1)

    Endif
Return

win:

if i = 5
     Restart =0
    gosub updatehightscore
    setTextString(finalscore,"Your final score is : " +str(score))
                SetSpriteVisible(winbg.spr, 1)
                SetTextVisible(finalscore, 1)
                SetSpriteVisible(gameover_bg.spr, 0)
                SetSpriteVisible(bg_hovered.spr, 0)
                SetSpriteVisible(ballons.spr, 0)
                SetSpriteVisible(title.spr, 0)
                SetSpriteVisible(play.spr, 0)
                SetSpriteVisible(highs.spr, 0)
                SetSpriteVisible(settings.spr, 0)
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
                SetTextVisible(losttext, 0)
                SetSpriteVisible(blankscore.spr,0)
                SetSpriteVisible(blanklives.spr, 0)
                SetTextVisible(ans, 0)
                SetTextVisible(prob1, 0)
                SetTextVisible(prob2, 0)
                SetTextVisible(prob3, 0)
                SetTextVisible(scortext, 0)
                SetTextVisible(livestext, 0)
                SetTextVisible(level, 0)
                //SetTextVisible(highscore, 1)

        repeat
            if GetPointerPressed() =1 then Restart = 1
                Sync()
         Until Restart = 1

    SetSpriteVisible(winbg.spr, 0)
    SetTextVisible(finalscore, 0)
    SetSpriteVisible(bg_hovered.spr, 1)
    SetSpriteVisible(ballons.spr, 1)
    SetSpriteVisible(title.spr, 1)
    SetSpriteVisible(quit2.spr, 1)
    SetSpriteVisible(play.spr, 1)
    SetSpriteVisible(highs.spr, 1)
    SetSpriteVisible(settings.spr, 1)
    gosub MenuGame

    Endif


return

closegame:

if GetPointerPressed() = 1
      if GetSpriteHitTest(closebtn.spr,getPointerX(),getPointerY())
        end
    endif
    endif
return

death:

if GetSpriteCollision(evil.spr,bonhomme.spr) = 1
    evil.x# = random (0,width)
    evil.y# = random (0, height)
    SetSpritePosition(evil.spr,evil.x# ,evil.y#)
	lives = lives - 1
	setTextString(livestext,"Lives " + str(lives))
	PlaySound(sound.error)

endif
return

enemychaser:

if evil.x# < bonhomme.x#
	 evil.x# =  evil.x# + 1
endif

if  evil.x# >  bonhomme.x#
	 evil.x# =  evil.x# - 1
endif

if  evil.y# < bonhomme.y#
	evil.y# = evil.y# + 1
endif

if evil.y# > bonhomme.y#
	evil.y# = evil.y# - 1
endif

SetSpritePosition(evil.spr,evil.x#,evil.y#)

return
update_questions:

    setTextString(losttext,"query : " + questions[i].query$)
    setTextString(ans,questions[i].answer$)
    setTextString(prob1,questions[i].prop1$)
    setTextString(prob2,questions[i].prop2$)
    setTextString(prob3,questions[i].prop3$)

return
update_propositon:

if (i mod 4 = 0)
    SetTextPosition(ans,ball1.x# - 15 ,ball1.y# - 15)
    SetTextPosition(prob1,ball2.x# - 15 ,ball2.y# - 15)
    SetTextPosition(prob2,ball3.x# - 15 ,ball3.y# - 15)
    SetTextPosition(prob3,ball4.x# - 15 ,ball4.y# - 15)
    rightanswer = ball1
    Endif
if (i mod 4 = 1)
    SetTextPosition(ans,ball3.x# - 15 ,ball3.y# - 15)
    SetTextPosition(prob1,ball4.x# - 15 ,ball4.y# - 15)
    SetTextPosition(prob2,ball2.x# - 15 ,ball2.y# - 15)
    SetTextPosition(prob3,ball1.x# - 15 ,ball1.y# - 15)
    rightanswer = ball3
     Endif

if (i mod 4 = 2)
    SetTextPosition(ans,ball2.x# - 15 ,ball2.y# - 15)
    SetTextPosition(prob1,ball4.x# - 15 ,ball4.y# - 15)
    SetTextPosition(prob2,ball3.x# - 15 ,ball3.y# - 15)
    SetTextPosition(prob3,ball1.x# - 15 ,ball1.y# - 15)
    rightanswer = ball2
     Endif
if (i mod 4 = 3)
    SetTextPosition(ans,ball4.x# - 15 ,ball4.y# - 15)
    SetTextPosition(prob1,ball2.x# - 15 ,ball2.y# - 15)
    SetTextPosition(prob2,ball1.x# - 15 ,ball1.y# - 15)
    SetTextPosition(prob3,ball3.x# - 15 ,ball3.y# - 15)
    rightanswer = ball4
     Endif
Return



Game_Settings:

    width = 1024
    height = 600
SetJoystickScreenPosition ( 50, 300, 64 )
    //i = random (1,4)

    ball1.sx# = 3
    ball1.sy# = 3

    ball2.sx# = 3
    ball2.sy# = 3

    ball3.sx# = 3
    ball3.sy# = 3

    ball4.sx# = 3
    ball4.sy# = 3

    ball1.xflag = 0
    ball2.xflag = 0
    ball3.xflag = 1
    ball4.xflag = 1

    ball1.yflag = 0
    ball2.yflag = 1
    ball3.yflag = 0
    ball4.yflag = 1

   // lastxpos = bonhomme.x#
   // lastypos = bonhomme.y#
    i as integer = 0

    score = 0
    lives = 3
return

Environment_Setup:
    setVirtualResolution (width,height)
    SetDisplayAspect (width/height)
    SetSyncRate(30,0)
return


Randomize_Ball1:
        ball1.x# = random (50, width/2 -50)
        ball1.y# = random (50, height -50)
    Return
Randomize_Ball2:
        ball2.x# = random (50, width/2-50 )
        ball2.y# = random (50, height/2-50)
    Return
Randomize_Ball3:
        ball3.x# = random (50, width/2 -50)
        ball3.y# = random (50, height -50)
    Return
Randomize_Ball4:
        ball4.x# = random (50, width/2 -50)
        ball4.y# = random (50, height -50)
    Return

Randomize_BH:
        bonhomme.x# = random (100, 300)
        bonhomme.y# = random (120, 600)
    Return

Randomize_evil:
        evil.x# = random (80, 100)
        evil.y# = random (80, 100)
    Return


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

MenuGame:


    finish as integer = 0

    Repeat
    if y > -125
            y = y-3

        EndIf
    if GetPointerPressed() = 1
      if GetSpriteHitTest(play.spr,getPointerX(),getPointerY())

            finish = 1
            SetSpriteVisible(bg_hovered.spr, 0)
            SetSpriteVisible(ballons.spr, 0)
            SetSpriteVisible(title.spr, 0)
            SetSpriteVisible(quit2.spr, 0)
            SetSpriteVisible(play.spr, 0)
            SetSpriteVisible(highs.spr, 0)
            SetSpriteVisible(settings.spr, 0)
            SetSpriteVisible(bonhomme.spr, 1)
            SetSpriteVisible(evil.spr, 1)
            SetSpriteVisible(ball1.spr, 1)
            SetSpriteVisible(ball2.spr, 1)
            SetSpriteVisible(ball3.spr, 1)
            SetSpriteVisible(ball4.spr, 1)
            SetSpriteVisible(blank.spr, 1)
            SetSpriteVisible(closebtn.spr, 1)
            SetSpriteVisible(obstacle1.spr, 1)
            SetSpriteVisible(obstacle2.spr, 1)
            SetTextVisible(losttext, 1)
            SetSpriteVisible(blankscore.spr,1)
            SetSpriteVisible(blanklives.spr, 1)
            SetTextVisible(ans, 1)
            SetTextVisible(prob1, 1)
            SetTextVisible(prob2, 1)
            SetTextVisible(prob3, 1)
            SetTextVisible(scortext, 1)
            SetTextVisible(livestext, 1)
            SetTextVisible(level, 1)
            SetRandomSeed(timer())
        EndIf


        if GetSpriteHitTest(quit2.spr,getPointerX(),getPointerY())
            end
        EndIf


      if GetSpriteHitTest(highs.spr,getPointerX(),getPointerY())
        finish = 0
            SetSpriteVisible(hs.spr, 1)
            SetTextVisible(highscore, 1)
            SetSpriteVisible(returne2.spr, 1)
            SetSpriteVisible(bg_hovered.spr, 0)
            SetSpriteVisible(ballons.spr, 0)
            SetSpriteVisible(quit2.spr, 0)
            SetSpriteVisible(title.spr, 0)
            SetSpriteVisible(play.spr, 0)
            SetSpriteVisible(highs.spr, 0)
            SetSpriteVisible(settings.spr, 0)
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
            SetTextVisible(losttext, 0)
            SetSpriteVisible(blankscore.spr,0)
            SetSpriteVisible(blanklives.spr, 0)
            SetTextVisible(ans, 0)
            SetTextVisible(prob1, 0)
            SetTextVisible(prob2, 0)
            SetTextVisible(prob3, 0)
            SetTextVisible(scortext, 0)
            SetTextVisible(livestext, 0)

               wait as integer = 0
                    Repeat
                    if y > -125
                            y = y-3

                    EndIf
            if GetPointerPressed() = 1
            if GetSpriteHitTest(returne2.spr,getPointerX(),getPointerY())

            wait = 1
                SetSpriteVisible(hs.spr, 0)
                SetTextVisible(highscore, 0)
                SetSpriteVisible(returne2.spr, 0)
                SetSpriteVisible(bg_settings.spr, 0)
                SetSpriteVisible(soundic.spr, 0)
                SetSpriteVisible(soundoff.spr, 0)
                SetSpriteVisible(returne.spr, 0)
                SetSpriteVisible(quit.spr, 0)
                SetSpriteVisible(bg_hovered.spr, 1)
                SetSpriteVisible(ballons.spr, 1)
                SetSpriteVisible(title.spr, 1)
                SetSpriteVisible(quit2.spr, 1)
                SetSpriteVisible(play.spr, 1)
                SetSpriteVisible(highs.spr, 1)
                SetSpriteVisible(settings.spr, 1)

            EndIf

            EndIF
            Sync()
            until wait = 1




    EndIF
    if GetSpriteHitTest(settings.spr,getPointerX(),getPointerY())
        finish = 0
            SetSpriteVisible(bg_hovered.spr, 0)
            SetSpriteVisible(bg_settings.spr, 1)
            SetSpriteVisible(soundic.spr, 1)
            SetSpriteVisible(returne.spr, 1)
            SetSpriteVisible(quit.spr, 1)
            SetSpriteVisible(ballons.spr, 0)
            SetSpriteVisible(title.spr, 0)
            SetSpriteVisible(quit2.spr, 0)
            SetSpriteVisible(play.spr, 0)
            SetSpriteVisible(highs.spr, 0)
            SetSpriteVisible(settings.spr, 0)
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
            SetTextVisible(losttext, 0)
            SetSpriteVisible(blankscore.spr,0)
            SetSpriteVisible(blanklives.spr, 0)
            SetTextVisible(ans, 0)
            SetTextVisible(prob1, 0)
            SetTextVisible(prob2, 0)
            SetTextVisible(prob3, 0)
            SetTextVisible(scortext, 0)
            SetTextVisible(livestext, 0)

            wait as integer = 0
                    Repeat
                    if y > -125
                            y = y-3

                    EndIf
            if GetPointerPressed() = 1
            if GetSpriteHitTest(returne.spr,getPointerX(),getPointerY())

            wait = 1
                SetSpriteVisible(bg_settings.spr, 0)
                SetSpriteVisible(soundic.spr, 0)
                SetSpriteVisible(soundoff.spr, 0)
                SetSpriteVisible(returne.spr, 0)
                SetSpriteVisible(quit.spr, 0)
                SetSpriteVisible(bg_hovered.spr, 1)
                SetSpriteVisible(ballons.spr, 1)
                SetSpriteVisible(title.spr, 1)
                SetSpriteVisible(quit2.spr, 1)
                SetSpriteVisible(play.spr, 1)
                SetSpriteVisible(highs.spr, 1)
                SetSpriteVisible(settings.spr, 1)

            EndIf
            if GetSpriteHitTest(quit.spr,getPointerX(),getPointerY())
               end
            EndIf
            if GetSpriteHitTest(soundic.spr,getPointerX(),getPointerY())
               if  getSpriteVisible(soundoff.spr) = 0
               SetSpriteVisible(soundoff.spr, 1)
               StopMusic()
               else
                SetSpriteVisible(soundoff.spr, 0)
                PlayMusic(music.theme, 1)
            EndIf

            EndIf


            EndIF
            Sync()
            until wait = 1


    EndIF
    EndIF
    Sync()
    until finish = 1
Return


tabrempl:
fileID = OpenToRead ( "file.txt" )
OpenToRead ( 1, "file.txt" )
c$ = ReadString ( 1 )
CloseFile ( 1 )
i = 1
 while (GetStringToken( c$, ";", i )<> "")
    q as _question
    item$ = GetStringToken( c$, ";", i )
    q.query$ = GetStringToken( item$, ":", 1)
    q.answer$ = GetStringToken( item$, ":", 2)
    q.prop1$ = GetStringToken( item$, ":", 3)
    q.prop2$ = GetStringToken( item$, ":", 4)
    q.prop3$ = GetStringToken( item$, ":", 5)
    questions[i-1] = q
   i = i+1
endwhile

return


updatehightscore:

FileR = OpenToRead( "score.txt" )
s0 as String  = ReadLine( FileR )
s1 as String  = ReadLine( FileR )
s2 as String  = ReadLine( FileR )
s3 as String  = ReadLine( FileR )
s4 as String  = ReadLine( FileR )
CloseFile(FileR)

dim array[5]as Integer
array[0] = val(s0)
array[1] = val(s1)
array[2] = val(s2)
array[3] = val(s3)
array[4] = val(s4)
array[5] = score


For i = 0 To 5
    For j = i + 1 To 5
        If (array [i] > array[j])
            temp = array[i]
            array[i] = array[j]
            array[j] = temp
        EndIf
    Next j
Next i

File = OpenToWrite ( "score.txt",0 )
WriteLine( File, str(array[5]) )
WriteLine( File, str(array[4]) )
WriteLine( File, str(array[3]) )
WriteLine( File, str(array[2]) )
WriteLine( File, str(array[1]) )
CloseFile ( File)


FileR = OpenToRead( "score.txt" )
s as String  = ReadString( FileR )
CloseFile(FileR)
setTextString(highscore,s)

gosub Readscore
return

Readscore:

FileR = OpenToRead( "score.txt" )
s as String  = ReadString( FileR )
CloseFile(FileR)
setTextString(highscore,s)

return
