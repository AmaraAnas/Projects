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


