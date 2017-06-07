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

