from bro_parser import broParse as br
import microbehavior_logic as ex
import pandas as pd
import os
import time
import sys
df_ex = pd.DataFrame()
df_be = pd.DataFrame()
df_mb_ex = pd.DataFrame()
df_mb_be = pd.DataFrame()

window_len = 5

def create_df_of_sliding_windows(df_raw_log, df_microbeahaviors):
    df_len = len(df_raw_log)
    if df_len > window_len:
        for i in range(0, df_len - window_len):
            df_raw_log_window = df_raw_log[i:i + window_len]
            dict_mb = ex.HTTPMicroBehaviors.behaviorVector(df_raw_log_window)
            df_from_dict = pd.DataFrame([dict_mb], columns=dict_mb.keys())
            df_microbeahaviors = df_microbeahaviors.append(df_from_dict, ignore_index=True)
            print('Total DF Size ',len(df_microbeahaviors))
    return df_microbeahaviors

print(sys.argv[1])
df_bro_raw_log_benign = br.bro_http_to_df(sys.argv[1])
df_mb_be = create_df_of_sliding_windows(df_bro_raw_log_benign, df_mb_be)
path, filename = os.path.split(sys.argv[1])
output_path = 'prod_csv/' + filename + '.csv'
print("Writing Benign BRO Microbehavior Statistics to CSV file: " + output_path)
df_mb_be.to_csv(output_path)
print("Done Writing Benign BRO Microbehavior Data")
