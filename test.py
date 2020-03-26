
import pandas as pd
import matplotlib.pyplot as plt
createGraph('FREEKICK','AKURDI')
def createGraph(Turf_Name,Area):
    import pandas as pd
    from matplotlib import pyplot as plt
    df=pd.read_csv('turfDetails.csv')
    turf=df[(df['turfName']==Turf_Name) & (df['turfArea']==Area)]
    x=turf['inTime'].unique()
    y=pd.DataFrame()
    y['time']=turf['inTime'].unique()
    y=turf['inTime'].value_counts().to_list()
    plt.plot(x,y)
    plt.xlabel('Time(hrs)')
    plt.ylabel('Frequency')
    plt.title("Popular Times")
    plt.tight_layout()
    fig=plt.gcf()
    fig.set_size_inches(11,8)
    
    return
    

    



# createGraph('FREEKICK','BANER')

# createGraph('TURF 10','AUNDH')

# createGraph('TURF 10','WAKAD')

# createGraph('DON BOSCO','YERAWADA')

# createGraph('DON BOSCO','KALYANINAGAR')

# createGraph('HIGH TURF FC','AKURDI')

# createGraph('HIGH TURF FC','KOTHRUD')

# createGraph('KICK OFF ARENA ','SHIVAJINAGAR')

# createGraph('TURF UP','HINJEWADI')

# createGraph('TURF 10','WAKAD')

# createGraph('TIGER PLAY ','YERAWADA')

# createGraph('REBOOT SPORTS ARENA ','HINJEWADI')

# createGraph('DRIBBLE ','KARVENAGAR')
