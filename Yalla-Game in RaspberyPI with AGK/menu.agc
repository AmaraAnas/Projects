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

